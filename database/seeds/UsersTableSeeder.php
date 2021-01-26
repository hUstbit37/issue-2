<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->delete();
        factory(User::class, 100)->create()->each( function ($user) {
            $user->school()->save(factory(\App\School::class)->make());
        });
    }
}