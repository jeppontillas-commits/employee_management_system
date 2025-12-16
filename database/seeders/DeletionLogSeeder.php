<?php

namespace Database\Seeders;

use App\Models\DeletionLog;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DeletionLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::where('status', 'terminated')->get();
        $users = User::all();

        $dependencies = [
            'No active projects',
            'All audit records archived',
            'Payroll finalized',
            'Benefits terminated',
            'Equipment returned',
            'System access revoked',
            'Email account deactivated',
            'No pending leave',
            'All contracts completed',
            'No pending approvals',
        ];

        // If no terminated employees, create deletion logs for sample employees
        if ($employees->isEmpty()) {
            $employees = Employee::inRandomOrder()->limit(3)->get();
        }

        foreach ($employees as $employee) {
            DeletionLog::create([
                'employee_id' => $employee->employee_id,
                'dependency' => implode(', ', array_rand(array_flip($dependencies), rand(2, 4))),
                'verified' => rand(0, 1) === 1,
                'validated_by' => $users->random()->user_id,
                'timestamp' => now()->subDays(rand(1, 60)),
            ]);
        }
    }
}
