<?php
declare(strict_types=1);
namespace App\Actions;

use App\DataObjects\Teams\NewTeam;
use Illuminate\Database\DatabaseManager;
use App\Models\Team;



final readonly class StoreTeam
{
    public function __construct(
        private DatabaseManager $db,
    ) {
    }


    public function handle(NewTeam $newTeam): Team
    {

        return $this->db->transaction(function () use ($newTeam) {
            return Team::query()->create($newTeam->toArray());
        });
       
    }
}
