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
        DB::table('users')->insert([
            'username'      =>'admin',
            'email'     =>'admin@admin.fr',
            'password'  =>Hash::make('admin'),
            'role'  =>'admin',
        ]);

        DB::table('users')->insert([
            'username'      =>'user',
            'email'     =>'user@user.fr',
            'password'  =>Hash::make('user'),
            'role'  =>'visitor',
        ]);

        factory(App\User::class, 2)->create();


    }
}
