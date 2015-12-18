<?php

use Illuminate\Database\Seeder;
use App\Art;

class ArtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auction = new Art;

        $auction->user_id = 1;
        $auction->artist_id = 1;
        $auction->style_id = 1;

        $auction->title = "Dance of Time III";
        $auction->description_nl = "description in het nederlands";
        $auction->description_en = "description in het engels";
        $auction->condition_nl = "Condition in het nederlands";
        $auction->condition_en = "condition in het engels";
        $auction->width = "30cm";
        $auction->height = "70cm";
        $auction->depth = "2.5cm";
        $auction->color = "Bronze, patinated branze and gold";
        $auction->date_of_creation = "1979-01-01";

        $auction->est_low_price = 9500;
        $auction->est_high_price = 10500;
        $auction->buyout = 15000;

        $auction->end_datetime = "2016-01-08 12:00:00";

        $auction->save();
    }
}
