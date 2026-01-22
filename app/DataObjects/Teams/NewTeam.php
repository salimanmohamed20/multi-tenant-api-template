<?php
declare(strict_types=1);
namespace App\DataObjects\Teams;


final readonly class NewTeam
{
    public function __construct(
        public  string $name,
        public  string $description,

    ) {
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}