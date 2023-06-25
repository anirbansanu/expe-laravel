<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryMenu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sub_category_id', 'added_by'];

    // Define relationships if needed
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
