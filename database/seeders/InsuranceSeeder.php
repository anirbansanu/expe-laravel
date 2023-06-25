<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\SubCategoryMenu;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the Insurance sub-category
        $insuranceSubCategory = SubCategory::where('name', 'Insurance')->first();

        // Create sub-category menus for Insurance
        $subCategoryMenus = [
            [
                'name' => 'Health Insurance',
                'added_by' => 1,
            ],
            [
                'name' => 'Life Insurance',
                'added_by' => 1,
            ],
            [
                'name' => 'Car Insurance',
                'added_by' => 1,
            ],
            [
                'name' => 'Home Insurance',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $insuranceSubCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
