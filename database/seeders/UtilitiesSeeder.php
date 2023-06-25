<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryMenu;

class UtilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $utilitiesCategory = SubCategory::where('name' , 'Utilities')->first();
        // Create sub-category menus for Utilities
        $subCategoryMenus = [
            [
                'name' => 'Phone Bills',
                'added_by' => 1,
            ],
            [
                'name' => 'Internet',
                'added_by' => 1,
            ],
            [
                'name' => 'Cable or Satellite TV',
                'added_by' => 1,
            ],
            [
                'name' => 'Streaming Services',
                'added_by' => 1,
            ],
        ];

        foreach ($subCategoryMenus as $menu) {
            SubCategoryMenu::create([
                'name' => $menu['name'],
                'sub_category_id' => $utilitiesCategory->id,
                'added_by' => $menu['added_by'],
            ]);
        }
    }
}
