<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            'first_name' => 'عبدلي',
            'last_name' => 'أحمد',
            'username' => 'أحمد 28',
            'email' => 'admin@gmail.com',
            'phone' => '0660000000',
            'password' => Hash::make('123456789'),
        ];

        DB::table('users')->insert($user);
    }
}
