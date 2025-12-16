<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reportTypes = [
            'Monthly Payroll Report',
            'Employee Directory Report',
            'Attendance Report',
            'Department Summary Report',
            'Salary Analysis Report',
            'Performance Review Report',
            'Employee Status Report',
            'HR Compliance Report',
            'Training Report',
            'Vacation Days Report',
            'Benefits Summary Report',
            'Hiring Pipeline Report',
            'Employee Turnover Report',
            'Skills Inventory Report',
            'Promotion History Report',
        ];

        $statuses = ['pending', 'generated', 'sent', 'failed'];
        $emails = [
            'hr@example.com',
            'finance@example.com',
            'admin@example.com',
            'manager1@example.com',
            'manager2@example.com',
        ];

        foreach ($reportTypes as $index => $type) {
            Report::create([
                'report_type' => $type,
                'action_date' => now()->subDays(rand(0, 60)),
                'update' => rand(0, 1) === 1 ? now()->subDays(rand(0, 30)) : null,
                'email' => $emails[array_rand($emails)],
                'status' => $statuses[array_rand($statuses)],
                'report_data' => json_encode([
                    'total_records' => rand(10, 500),
                    'period' => 'Monthly',
                    'generated_by' => 'System Scheduler',
                    'includes_details' => rand(0, 1) === 1 ? true : false,
                ]),
            ]);
        }

        // Add some additional random reports
        for ($i = 0; $i < 10; $i++) {
            Report::create([
                'report_type' => $reportTypes[array_rand($reportTypes)],
                'action_date' => now()->subDays(rand(0, 90)),
                'update' => rand(0, 1) === 1 ? now()->subDays(rand(0, 45)) : null,
                'email' => $emails[array_rand($emails)],
                'status' => $statuses[array_rand($statuses)],
                'report_data' => json_encode([
                    'total_records' => rand(5, 1000),
                    'period' => 'Monthly',
                    'generated_by' => 'Manual Request',
                ]),
            ]);
        }
    }
}
