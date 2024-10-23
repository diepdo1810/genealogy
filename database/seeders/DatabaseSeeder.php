<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::Statement("SET FOREIGN_KEY_CHECKS=0;");
        $this->call([
            GenderSeeder::class,
        ]);

        if (app()->isProduction()) {
            DB::Statement("SET FOREIGN_KEY_CHECKS=1;");
            return;
        }
        // DEMO DATA
        $this->call([
            UserAndTeamSeeder::class,
            DemoSeeder::class,

            // TreeSeeder::class,
        ]);
        DB::Statement("SET FOREIGN_KEY_CHECKS=1;");

        // -----------------------------------------------------------------------
        // if you want to use the application in production, please remove :
        //
        // - the DEMO DATA seeder call above
        // - the database seeder /database/seeders/DemoSeeder.php
        // - the database seeder /database/seeders/TreeSeeder.php
        // - the database seeder /database/seeders/UserAndTeamSeeder.php
        //
        // - the folder /public/xml
        // - the content of folder /storage/app/public/photos
        // - the content of folder /storage/app/public/photos-096
        // - the content of folder /storage/app/public/photos-384
        // - the content of folder /storage/app/public/profile-photos
        // - the content of folder /storage/app/backups/genealogy
        // -----------------------------------------------------------------------
    }
}
