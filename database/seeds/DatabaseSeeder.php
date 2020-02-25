<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(QuartersTableSeeder::class);
        $this->call(SemestersTableSeeder::class);
        $this->call(TransmutedGradesTableSeeder::class);
        $this->call(TracksTableSeeder::class);
    }
}
