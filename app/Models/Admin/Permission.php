<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
