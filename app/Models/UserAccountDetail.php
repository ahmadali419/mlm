<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccountDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "account_title",
        "account_number",
        "bank_name",
        "wallet_address",
        "status"
    ];
}
