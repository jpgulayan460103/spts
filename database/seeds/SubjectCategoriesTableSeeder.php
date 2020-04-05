<?php

use Illuminate\Database\Seeder;
use App\Models\SubjectCategory;

class SubjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject_categories = [
            [
                'name' => 'CORE SUBJECT',
            ],
            [
                'name' => 'APPLIED SUBJECT',
            ],
            [
                'name' => 'MAJOR SUBJECT',
            ],
        ];
        foreach ($subject_categories as $subject_category) {
            $created_subject_category = SubjectCategory::create($subject_category);
            echo "\e[0;31m Created Subject Category: \e[0m";
            echo "\e[0;34m name:\e[0m $created_subject_category->name ";
            echo "\n";
        }
    }
}
