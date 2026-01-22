<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Sprout\Attributes\TenantRelation;
use Sprout\Database\Eloquent\Concerns\BelongsToTenant;



abstract class AbstractTenant extends Model 
{

    use HasFactory;
       use BelongsToTenant;


    #[TenantRelation]
    public function organization(){
        return $this->belongsTo(Organization::class);
    }
}