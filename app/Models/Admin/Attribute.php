<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'unit'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
