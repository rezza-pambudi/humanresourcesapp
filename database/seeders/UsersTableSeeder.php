<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
               'name' => 'Rezza',
               'email' => Str::random(10).'@example.com',
               'email_verified_at' => Carbon::now(),
               'password' => Hash::make('password'),
               'remember_token' => null,
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
               'employee_id' => 'EMP-'.Str::upper(Str::random(5)),
           ]);
    }
}
