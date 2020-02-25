<?php

use Illuminate\Database\Seeder;
use App\Track;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tracks = [
            [
                'track_name' => 'Core Subject',
                'written_work' => 0.25,
                'performance_task' => 0.50,
                'quarterly_exam' => 0.25
            ],
            [
                'track_name' => 'Applied Subject',
                'written_work' => 0.25,
                'performance_task' => 0.40,
                'quarterly_exam' => 0.35
            ],
            [
                'track_name' => 'Major Subject',
                'written_work' => 0.20,
                'performance_task' => 0.60,
                'quarterly_exam' => 0.20
            ],
        ];
        foreach ($tracks as $track) {
            $created_track = track::create($track);
            echo "\e[0;31m Created track: \e[0m";
            echo "\e[0;34m Track Name:\e[0m $created_track->track_name ";
            echo "\e[0;34m Written Work:\e[0m $created_track->written_work ";
            echo "\e[0;34m Performance Task:\e[0m $created_track->performance_task ";
            echo "\e[0;34m Quarterly Exam:\e[0m $created_track->quarterly_exam ";
            echo "\n";
        }
    }
}
