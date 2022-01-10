<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'email' => 'alex@tempmail.com',
                'active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'maria@tempmail.com',
                'active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'john@tempmail.com',
                'active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'dominik@test.com',
                'active' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'andreas@yahoo.de',
                'active' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'Taaaaaaa@test.com',
                'active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'rerere@test_mail.com',
                'active' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
