<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeProfileHistory;
use Illuminate\Database\Seeder;

class EmployeeProfileHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        $changeTypes = [
            'Name change due to marriage',
            'Contact number updated',
            'Email address changed',
            'Address relocation',
            'Department transfer',
            'Position upgrade',
            'Phone number correction',
            'Emergency contact change',
            'Mailing address update',
            'Work location change',
        ];

        foreach ($employees as $employee) {
            // Create 1-3 history records per employee
            $historyCount = rand(1, 3);
            for ($i = 0; $i < $historyCount; $i++) {
                EmployeeProfileHistory::create([
                    'employee_id' => $employee->employee_id,
                    'name' => $employee->name,
                    'email' => $employee->email,
                    'contact_no' => $employee->contact_no,
                    'history_data' => json_encode([
                        'change_type' => $changeTypes[array_rand($changeTypes)],
                        'changed_from' => 'Previous value ' . ($i + 1),
                        'changed_to' => 'New value ' . ($i + 1),
                        'change_reason' => 'Employee request / Administrative update / System correction',
                        'old_department' => 'Previous Department',
                        'new_department' => 'New Department',
                    ]),
                    'changed_date' => now()->subDays(rand(1, 120)),
                ]);
            }
        }
    }
}
