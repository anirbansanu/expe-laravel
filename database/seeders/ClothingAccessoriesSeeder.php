<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClothingAccessoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the Clothing and Accessories sub-category
        $clothingAccessoriesSubCategory = SubCategory::where('name', 'Clothing and Accessories')->first();

        // Create sub-category menus for Clothing and Accessories
        $subCategoryMenus = [
            [
                'name' => 'Clothing Purchases',
                'added_by' => 1,
            ],
            [
                'name' => 'Shoes',
                'added_by' => 1,
            ],
            [
                'name' => 'Accessories',
                'added_by' => 1,
            ],
            [
                'name' => 'Dry Cleaning',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $clothingAccessoriesSubCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
