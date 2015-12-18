<?php

use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = new App\Artist;

        $artist->name = 'pablo picasso';
        $artist->date_of_birth = "1881-10-25";
        $artist->date_of_death = "1973-04-08";
        $artist->country = "Spanish";

        $artist -> save();
    }
}
