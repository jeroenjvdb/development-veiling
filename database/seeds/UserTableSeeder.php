<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;

        $user->surname = "jeroen";
        $user->name = "Van den Broeck";
        $user->password = Hash::make('root');
        $user->email = "jeroen_vdb1@hotmail.com";
        $user->date_of_birth = "1995-04-21";

        $user->save();
    }
}
