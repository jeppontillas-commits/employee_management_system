<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run seeders in order to maintain referential integrity
        $this->call([
            UserSeeder::class,
            SystemSettingSeeder::class,
            EmployeeSeeder::class,
            AuditRecordSeeder::class,
            EmployeeProfileHistorySeeder::class,
            ReportSeeder::class,
            DeletionLogSeeder::class,
        ]);
    }
}
