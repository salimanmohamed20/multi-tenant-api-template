<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CollectionResource;
use App\Http\Resources\DateResource;



class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
     return   [
        'id' => $this->id,
        'name' => $this->name,
        'description' => $this->description,
        "identifier" => $this->identifier,
        'resource_key' => $this->resource_key,
        'created_at' => new DateResource($this->created_at),
        "teams"=>TeamResource::collection($this->whenLoaded('teams')),
        "users"=>UserResource::collection($this->whenLoaded('users')),
      
     ];
    }
}
