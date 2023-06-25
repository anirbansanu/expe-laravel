<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntertainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $entertainmentCategory = SubCategory::where('name' , 'Entertainment')->first();
        // Create sub-category menus for Entertainment
        $subCategoryMenus = [
            [
                'name' => 'Movie Tickets',
                'added_by' => 1,
            ],
            [
                'name' => 'Concerts',
                'added_by' => 1,
            ],
            [
                'name' => 'Events',
                'added_by' => 1,
            ],
            [
                'name' => 'Hobbies',
                'added_by' => 1,
            ],
            [
                'name' => 'Subscriptions',
                'added_by' => 1,
            ],
            [
                'name' => 'Recreational Activities',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $entertainmentCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
