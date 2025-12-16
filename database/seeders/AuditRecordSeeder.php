<?php

namespace Database\Seeders;

use App\Models\AuditRecord;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class AuditRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        $actions = [
            'Employee profile updated - Name changed',
            'Employee department changed from IT to Finance',
            'Employee promoted to Senior Developer',
            'Employee status changed to on_leave',
            'Employee contact information updated',
            'Employee salary adjustment approved',
            'Performance review completed',
            'Training completion recorded',
            'Project assignment updated',
            'Employment contract renewed',
            'Employee emergency contact updated',
            'Background check verified',
            'Security clearance renewed',
            'Certification added to employee record',
            'Employee benefit enrollment completed',
        ];

        foreach ($employees as $employee) {
            // Create 2-5 audit records per employee
            $recordCount = rand(2, 5);
            for ($i = 0; $i < $recordCount; $i++) {
                AuditRecord::create([
                    'employee_id' => $employee->employee_id,
                    'action_description' => $actions[array_rand($actions)],
                    'action_date' => now()->subDays(rand(1, 90)),
                    'validated' => rand(0, 1) === 1,
                ]);
            }
        }
    }
}
