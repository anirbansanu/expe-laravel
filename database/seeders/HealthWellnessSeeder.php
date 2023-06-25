<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\SubCategoryMenu;

class HealthWellnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the Health and Wellness sub-category
        $healthWellnessSubCategory = SubCategory::where('name', 'Health and Wellness')->first();

        // Create sub-category menus for Health and Wellness
        $subCategoryMenus = [
            [
                'name' => 'Doctor Visits',
                'added_by' => 1,
            ],
            [
                'name' => 'Medications',
                'added_by' => 1,
            ],
            [
                'name' => 'Health Supplements',
                'added_by' => 1,
            ],
            [
                'name' => 'Gym Memberships',
                'added_by' => 1,
            ],
            [
                'name' => 'Fitness Classes',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $healthWellnessSubCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}

