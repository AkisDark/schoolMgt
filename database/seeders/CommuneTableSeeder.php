<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dairas = json_decode(file_get_contents(database_path('seeders/json/commune.json')));

        $data = [];
        
        foreach ($dairas as $da) {
            $data[] = [
                'wilaya_id' => $da->wilaya_id,
                'name' => $da->ar_name
            ];
        }
        DB::table('dairas')->insert($data);
    }
}
