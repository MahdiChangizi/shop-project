<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'user_id'];

    // public function scopeGenerateCode($query, $user)
    // {
    //     $code = mt_rand(100000, 999999);
    // }



}
