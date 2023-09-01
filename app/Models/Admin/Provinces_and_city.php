<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces_and_city extends Model
{
    use HasFactory;

    protected $table = 'provinces_and_cities';
    protected $fillable = ['name', 'parent_id', 'status'];



    public function children()
    {
        return $this->hasMany(Provinces_and_city::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Provinces_and_city::class, 'parent_id');
    }

}
