<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFund extends Model
{
    use HasFactory;
    protected $guarded = [
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User','id',"user_id");
    }
}
