<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SiterolesSeeder::class);
        $this->call(DefaultCompanyrolesSeeder::class);
        $this->call(CompanyrolePermissionsSeeder::class);
        $this->call(DefaultCompanycategoriesSeeder::class);
    }
}
