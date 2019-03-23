<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'email'=>'admin@gmail.com',
            'username'=>'admin',
        	'password'=>bcrypt('12345678'),
        	'term_services'=>'on',
        	'role'=>'ADMIN',
            'confirmed'=>'1',
            'pass_reset'=>'12345678',
        ]);
    }
}
