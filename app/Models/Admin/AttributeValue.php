<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = 'attribute_values';
    protected $fillable = ['value'];

    public function attributes()
    {
        return $this->belongsTo(Attribute::class);
    }
}
