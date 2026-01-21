<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Organization;
use Illuminate\Database\DatabaseManager;
use Sprout\Attributes\CurrentTenant;

final readonly class LoginController
{
    public function __construct(
        #[CurrentTenant] private Organization $organization,
        private DatabaseManager $db
    ) {}

    public function __invoke(LoginRequest $request)
    {
        // Authenticate user with tenant (organization)
        $request->authenticate(
            organizationId: $this->organization->id,

        );

        $token = $this->db->transaction(function () use ($request) {
            return $request->user()->createToken(
                $request->userAgent() ?? 'api-token',
                ['*']
            );
        });

        return response()->json([
            'token' => $token->plainTextToken,
            'user'  => $request->user(),
        ]);
    }
}
