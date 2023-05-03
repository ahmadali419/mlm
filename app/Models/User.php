<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'sponser_code',
        'cnic',
        'referral_id',
        'address',
        'profile_pic',
        'country_id',
        'city_id',
        'ip_address',
        'sponser_code',
        'status',
        'cnic_front_pic',
        'cnic_back_pic',
        'phone_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeHasRole($query, $role)
    {
        $query->where('role', '=', $role);
    }
    public function userAccountDetail()
    {
        return $this->hasOne('App\Models\UserAccountDetail');
    }

    public function userPackages(){
        return $this->hasMany(UserPackage::class)->with("package");
    }
    public function deposit()
    {
        return $this->hasOne('App\Models\UserFund');
    }
    public function parent()
    {
         return $this->belongsTo('App\Models\User', 'referral_id');
    }
    
    /**
    * list parents ids 
    * @return array
    */
    public function listParents()
    {
        $user = $this;
        $parents = collect([]) ;

        while ($user->parent) {
            $user = $user->parent;
            $parents->push($user);
        };

        return array_reverse($parents->pluck('id')->toArray());
    }

    public function parents() {
        return $this->belongsTo(User::class, 'referral_id');
    }

    public function children() {
        return $this->hasMany(User::class, 'referral_id');
    }
}
