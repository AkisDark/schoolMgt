<?php

namespace Database\Seeders;

use App\Models\Wilaya;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $school[] = [
            'name' => 'عثمان بن عفان',
            'fax' =>'035000000',
            'email' =>'school@gmail.com',
            'fixed_phone'=>'035000000',
            'wilaya_id' =>28,
            'dairas_id' =>995,
        ];

        DB::table('schools')->insert($school);
    }
}
