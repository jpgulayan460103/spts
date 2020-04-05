<?php

use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = [
            ['name' => 'First Semester'],
            ['name' => 'Second Semester'],
        ];
        foreach ($semesters as $semester) {
            $created_semester = Semester::create($semester);
            echo "\e[0;31m Created Semester: \e[0m";
            echo "$created_semester->name\n";
        }
    }
}
