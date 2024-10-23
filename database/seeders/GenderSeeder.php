<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Statement("TRUNCATE TABLE `genders`");
        DB::Statement("
            INSERT INTO `genders` (`name`) VALUES
            ('Male'),
            ('Female'),
            ('Other'),
            ('Prefer not to say')
        ");
    }
}
