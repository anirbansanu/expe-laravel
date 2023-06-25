<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebtPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Find the Debt Payments sub-category
       $debtPaymentsSubCategory = SubCategory::where('name', 'Debt Payments')->first();

       // Create sub-category menus for Debt Payments
       $subCategoryMenus = [
           [
               'name' => 'Credit Card Payments',
               'added_by' => 1,
           ],
           [
               'name' => 'Student Loan Payments',
               'added_by' => 1,
           ],
           [
               'name' => 'Personal Loan Payments',
               'added_by' => 1,
           ],
           [
               'name' => 'Other Debts',
               'added_by' => 1,
           ],
       ];

       foreach ($subCategoryMenus as $menu) {
           SubCategoryMenu::create([
               'name' => $menu['name'],
               'sub_category_id' => $debtPaymentsSubCategory->id,
               'added_by' => $menu['added_by'],
           ]);
       }
    }
}
