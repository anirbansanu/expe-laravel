<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','category_id' ,'added_by' ];

    public function getUploadedAtAttribute($value)
    {
        return $this->created_at->diffForHumans();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getCategoryNameAttribute($value)
    {
        return $this->category->name;
    }
    public function menus()
    {
        return $this->hasMany(SubCategoryMenu::class);
    }
}
