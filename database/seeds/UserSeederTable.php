<?php

use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = array(
      [ 'name' => 'Tim Wright', 'created_at' => new DateTime, 'email' => 'tim@btar.co.uk', 'password' => Hash::make('brennan') ],
    );
      DB::table('users')->insert($user);
    }
}
