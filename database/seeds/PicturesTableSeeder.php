<?php

use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<15;$i++)
        {
            $pic = new App\Picture;

            $pic->art_id = $i+1;
            $pic->url = '/auction/img/34047.jpg';
            $pic->isMaster = 1;

            $pic->save();

            $pic = new App\Picture;

            $pic->art_id = $i+1;
            $pic->url = '/auction/img/47179.jpg';
            $pic->isMaster = 0;

            $pic->save();

            $pic = new App\Picture;

            $pic->art_id = $i+1;
            $pic->url = '/auction/img/47179.jpg';
            $pic->isMaster = 0;

            $pic->save();
        }

    }
}
