<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $parents = [];

        $parents[] = [
            'first_name' => 'نابي',
            'last_name' => 'سعيد',
            'email' => 'nabi34@gmail.com',
            'identity_card' => '673836044703',
            'phone' => '066000000',
        ];

        $parents[] = [
            'first_name' => 'موسعي',
            'last_name' => 'احمد',
            'email' => 'mouss_ahmed@gmail.com',
            'identity_card' => '908078708',
            'phone' => '066000000',
        ];

        $parents[] = [
            'first_name' => 'يوسفي',
            'last_name' => 'عبد الحميد',
            'email' => 'yossfi@gmail.com',
            'identity_card' => '765764574675',
            'phone' => '066000000',
        ];

        DB::table('parents')->insert($parents);
    }
}
