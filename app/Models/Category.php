<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_description','added_by' ];

    public function getUploadedAtAttribute($value)
    {
        return $this->created_at->diffForHumans();
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
