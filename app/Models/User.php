<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\ActiveCode;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userName',
        'mobile',
        'password',
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
        'password' => 'hashed',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'userName'
            ]
        ];
    }



    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }




    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }



    public function hasPermission($permission)
    {
        return $this->permissions->where('name', $permission->name)->first() || $this->hasRole($permission->roles);
    }



    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function codes()
    {
        return $this->hasMany(ActiveCode::class);
    }


    public function getFullNameAttribute()
    {
        return $this->profile->first_name . ' ' . $this->profile->last_name ;
    }
}