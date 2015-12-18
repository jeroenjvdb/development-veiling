<?php

use Illuminate\Database\Seeder;
use App\Style;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $style = new Style;
        $style->name = 'Abstract';
        $style->save();

        $style = new Style;
        $style->name = 'African American';
        $style->save();

        $style = new Style;
        $style->name = 'Asian Contemporary';
        $style->save();
    }
}
