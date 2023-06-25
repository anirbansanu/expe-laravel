<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'name' => 'Entertainment',
                'description' => 'Movie tickets, concerts, events, hobbies, subscriptions, and recreational activities.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Education',
                'description' => 'Tuition fees, books, supplies, courses, and workshops.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Health and Wellness',
                'description' => 'Doctor visits, medications, health supplements, gym memberships, and fitness classes.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Clothing and Accessories',
                'description' => 'Clothing purchases, shoes, accessories, and dry cleaning.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Gifts and Donations',
                'description' => 'Presents for birthdays, holidays, charitable contributions, and donations.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Travel and Vacation',
                'description' => 'Flights, accommodations, transportation, meals, and activities during trips.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Childcare and Education',
                'description' => 'Daycare expenses, school tuition, school supplies, and extracurricular activities for children.',
                'added_by' => 1,'category_id'=>6,
            ],
            [
                'name' => 'Miscellaneous',
                'description' => 'Any other expenses that don\'t fit into the above categories, such as bank fees, subscriptions, home improvement projects, or unexpected costs.',
                'added_by' => 1,'category_id'=>6,
            ],
        ];

        foreach ($categories as $category) {
            SubCategory::create($category);
        }
    }
}
