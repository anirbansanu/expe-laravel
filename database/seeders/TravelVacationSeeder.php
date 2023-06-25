<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelVacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the Travel and Vacation sub-category
        $travelVacationSubCategory = SubCategory::where('name', 'Travel and Vacation')->first();

        // Create sub-category menus for Travel and Vacation
        $subCategoryMenus = [
            [
                'name' => 'Flights',
                'added_by' => 1,
            ],
            [
                'name' => 'Accommodations',
                'added_by' => 1,
            ],
            [
                'name' => 'Transportation',
                'added_by' => 1,
            ],
            [
                'name' => 'Meals',
                'added_by' => 1,
            ],
            [
                'name' => 'Activities',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $travelVacationSubCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
