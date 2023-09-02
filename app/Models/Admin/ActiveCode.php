<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function scopeGenerateCode($query, $user)
    // {
    //     $code = mt_rand(100000, 999999);
    // }



}
