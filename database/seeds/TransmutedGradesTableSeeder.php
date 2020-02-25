<?php

use Illuminate\Database\Seeder;
use App\TransmutedGrade;

class TransmutedGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transmuted_grades = [
            ['grade' => 0,'transmuted_grade' => 0],
            ['grade' => 0.1,'transmuted_grade' => 60],
            ['grade' => 4,'transmuted_grade' => 61],
            ['grade' => 8,'transmuted_grade' => 62],
            ['grade' => 12,'transmuted_grade' => 63],
            ['grade' => 16,'transmuted_grade' => 64],
            ['grade' => 20,'transmuted_grade' => 65],
            ['grade' => 24,'transmuted_grade' => 66],
            ['grade' => 28,'transmuted_grade' => 67],
            ['grade' => 32,'transmuted_grade' => 68],
            ['grade' => 36,'transmuted_grade' => 69],
            ['grade' => 40,'transmuted_grade' => 70],
            ['grade' => 44,'transmuted_grade' => 71],
            ['grade' => 48,'transmuted_grade' => 72],
            ['grade' => 52,'transmuted_grade' => 73],
            ['grade' => 56,'transmuted_grade' => 74],
            ['grade' => 60,'transmuted_grade' => 75],
            ['grade' => 61.6,'transmuted_grade' => 76],
            ['grade' => 63.2,'transmuted_grade' => 77],
            ['grade' => 64.8,'transmuted_grade' => 78],
            ['grade' => 66.4,'transmuted_grade' => 79],
            ['grade' => 68,'transmuted_grade' => 80],
            ['grade' => 69.6,'transmuted_grade' => 81],
            ['grade' => 71.2,'transmuted_grade' => 82],
            ['grade' => 72.8,'transmuted_grade' => 83],
            ['grade' => 74.4,'transmuted_grade' => 84],
            ['grade' => 76,'transmuted_grade' => 85],
            ['grade' => 77.6,'transmuted_grade' => 86],
            ['grade' => 79.2,'transmuted_grade' => 87],
            ['grade' => 80.8,'transmuted_grade' => 88],
            ['grade' => 82.4,'transmuted_grade' => 89],
            ['grade' => 84,'transmuted_grade' => 90],
            ['grade' => 85.6,'transmuted_grade' => 91],
            ['grade' => 87.2,'transmuted_grade' => 92],
            ['grade' => 88.8,'transmuted_grade' => 93],
            ['grade' => 90.4,'transmuted_grade' => 94],
            ['grade' => 92,'transmuted_grade' => 95],
            ['grade' => 93.6,'transmuted_grade' => 96],
            ['grade' => 95.2,'transmuted_grade' => 97],
            ['grade' => 96.8,'transmuted_grade' => 98],
            ['grade' => 98.4,'transmuted_grade' => 99],
            ['grade' => 100,'transmuted_grade' => 100],
        ];
        foreach ($transmuted_grades as $transmuted_grade) {
            $created_transmuted_grade = TransmutedGrade::create($transmuted_grade);
            echo "\e[0;31m Created Grade Transmuter: \e[0m";
            echo "\e[0;34m Grade:\e[0m $created_transmuted_grade->grade ";
            echo "\e[0;34m Transmuted Grade:\e[0m $created_transmuted_grade->transmuted_grade";
            echo "\n";
        }
    }
}











































