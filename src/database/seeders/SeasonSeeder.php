<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('seasons')->truncate();
        DB::table('seasons')->insert([
            ['id' => 1, 'name' => '春'],
            ['id' => 2, 'name' => '夏'],
            ['id' => 3, 'name' => '秋'],
            ['id' => 4, 'name' => '冬'],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
