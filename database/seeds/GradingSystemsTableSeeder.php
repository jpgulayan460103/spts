<?php

use Illuminate\Database\Seeder;
use App\Models\GradingSystem;

class GradingSystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grading_systems = [
            [
                'subject_category_id' => 1,
                'category' => 'Written Work',
                'grading_system' => 0.25,
            ],
            [
                'subject_category_id' => 1,
                'category' => 'Performance Task',
                'grading_system' => 0.50,
            ],
            [
                'subject_category_id' => 1,
                'category' => 'Quarterly Exam',
                'grading_system' => 0.25,
            ],
            [
                'subject_category_id' => 2,
                'category' => 'Written Work',
                'grading_system' => 0.25,
            ],
            [
                'subject_category_id' => 2,
                'category' => 'Performance Task',
                'grading_system' => 0.40,
            ],
            [
                'subject_category_id' => 2,
                'category' => 'Quarterly Exam',
                'grading_system' => 0.35,
            ],
            [
                'subject_category_id' => 3,
                'category' => 'Written Work',
                'grading_system' => 0.20,
            ],
            [
                'subject_category_id' => 3,
                'category' => 'Performance Task',
                'grading_system' => 0.60,
            ],
            [
                'subject_category_id' => 3,
                'category' => 'Quarterly Exam',
                'grading_system' => 0.20,
            ],
        ];
        foreach ($grading_systems as $grading_system) {
            $created_grading_system = GradingSystem::create($grading_system);
            echo "\e[0;31m Created track: \e[0m";
            echo "\e[0;34m subject_category_id:\e[0m $created_grading_system->subject_category_id ";
            echo "\e[0;34m category:\e[0m $created_grading_system->category ";
            echo "\e[0;34m grading system:\e[0m $created_grading_system->grading_system ";
            echo "\n";
        }
    }
}
