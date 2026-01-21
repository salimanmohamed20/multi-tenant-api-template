<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sprout\Contracts\Tenant;
use Sprout\Contracts\TenantHasResources;
use Sprout\Database\Eloquent\Concerns\HasTenantResources;
use Sprout\Database\Eloquent\Concerns\IsTenant;

class Organization extends Model implements Tenant, TenantHasResources
{
    use IsTenant;
    use HasFactory;
    use HasTenantResources;
protected $guarded = [];
 public function users()
    {
        return $this->hasMany(User::class);
    }
}
