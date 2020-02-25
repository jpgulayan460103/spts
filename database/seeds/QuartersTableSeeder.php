<?php

use Illuminate\Database\Seeder;
use App\Quarter;

class QuartersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quarters = [
            ['name' => 'First Quarter'],
            ['name' => 'Second Quarter'],
            ['name' => 'Third Quarter'],
            ['name' => 'Fourth Quarter'],
        ];
        foreach ($quarters as $quarter) {
            $created_quarter = Quarter::create($quarter);
            echo "\e[0;31m Created Quarter: \e[0m";
            echo "$created_quarter->name\n";
        }
    }
}
