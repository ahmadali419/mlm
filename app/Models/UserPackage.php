<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function package()
    {
        return $this->hasOne(Package::class,"id","package_id");
    }
}
