<?php

use Illuminate\Database\Seeder;
use App\Models\Track;

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
            ['name' => 'ACADEMIC TRACK – Accountancy, Business and Management (ABM)'],
            ['name' => 'ACADEMIC TRACK – General Academic Strand (GAS)'],
            ['name' => 'TECHNICAL VOCATIONAL TRACK – Home Economics Strand'],
            ['name' => 'TECHNICAL VOCATIONAL TRACK – Information and Communications Technology'],
        ];
        foreach ($tracks as $track) {
            $created_track = Track::create($track);
            echo "\e[0;31m Created track: \e[0m";
            echo "\e[0;34m Track Name:\e[0m $created_track->name ";
            echo "\n";
        }
    }
}
