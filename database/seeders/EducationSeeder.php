<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the Education sub-category
        $educationSubCategory = SubCategory::where('name', 'Education')->first();

        // Create sub-category menus for Education
        $subCategoryMenus = [
            [
                'name' => 'Tuition Fees',
                'added_by' => 1,
            ],
            [
                'name' => 'Books',
                'added_by' => 1,
            ],
            [
                'name' => 'Supplies',
                'added_by' => 1,
            ],
            [
                'name' => 'Courses',
                'added_by' => 1,
            ],
            [
                'name' => 'Workshops',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $educationSubCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
