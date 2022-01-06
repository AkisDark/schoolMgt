<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $wilayas = json_decode(file_get_contents(database_path('seeders/json/wilaya.json')));

        $data = [];

        foreach ($wilayas as $wilaya) {
            $data[] = [
                'name' => $wilaya->ar_name,
            ];
        }
        DB::table('wilayas')->insert($data);
    }
}
