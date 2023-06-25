<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiftsDonationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Find the Gifts and Donations sub-category
        $giftsDonationsSubCategory = SubCategory::where('name', 'Gifts and Donations')->first();

        // Create sub-category menus for Gifts and Donations
        $subCategoryMenus = [
            [
                'name' => 'Birthday Presents',
                'added_by' => 1,
            ],
            [
                'name' => 'Holiday Presents',
                'added_by' => 1,
            ],
            [
                'name' => 'Charitable Contributions',
                'added_by' => 1,
            ],
            [
                'name' => 'Donations',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $giftsDonationsSubCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
