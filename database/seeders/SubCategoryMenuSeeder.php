<?php

namespace Database\Seeders;

use App\Models\SubCategoryMenu;
use Illuminate\Database\Seeder;

class SubCategoryMenuSeeder extends Seeder
{
    public function run()
    {
        $subCategoryMenus = [
            // Housing
            [
                'name' => 'Rent',
                'sub_category_id' => 1,
                'added_by' => 1,
            ],
            [
                'name' => 'Property Taxes',
                'sub_category_id' => 1,
                'added_by' => 1,
            ],
            [
                'name' => 'Home Insurance',
                'sub_category_id' => 1,
                'added_by' => 1,
            ],
            [
                'name' => 'Utilities',
                'sub_category_id' => 1,
                'added_by' => 1,
            ],
            [
                'name' => 'Maintenance and Repairs',
                'sub_category_id' => 1,
                'added_by' => 1,
            ],

            // Transportation
            [
                'name' => 'Vehicle Payments',
                'sub_category_id' => 13,
                'added_by' => 1,
            ],
            [
                'name' => 'Fuel',
                'sub_category_id' => 13,
                'added_by' => 1,
            ],
            [
                'name' => 'Public Transportation Fares',
                'sub_category_id' => 13,
                'added_by' => 1,
            ],
            [
                'name' => 'Parking Fees',
                'sub_category_id' => 13,
                'added_by' => 1,
            ],
            [
                'name' => 'Maintenance and Repairs',
                'sub_category_id' => 13,
                'added_by' => 1,
            ],

            // Food
            [
                'name' => 'Groceries',
                'sub_category_id' => 10,
                'added_by' => 1,
            ],
            [
                'name' => 'Dining Out',
                'sub_category_id' => 10,
                'added_by' => 1,
            ],
            [
                'name' => 'Snacks and Beverages',
                'sub_category_id' => 10,
                'added_by' => 1,
            ],

            // Add more sub-category menus as needed
        ];

        foreach ($subCategoryMenus as $subCategoryMenu) {
            SubCategoryMenu::create($subCategoryMenu);
        }
    }
}
