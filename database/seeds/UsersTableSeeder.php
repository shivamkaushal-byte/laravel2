<?php

use Illuminate\Database\Seeder;

use App\User;

use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::where('email','shivam.kaushal@srijan.net')->first();

      if(!$user){
        User::create([
          'name' => 'shivam',
          'email'=> 'shivam.kaushal@srijan.net',
          'role' => 'admin',
          'password' => Hash::make('password12')
        ]);
      }
        //
    }
}
