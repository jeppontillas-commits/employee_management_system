<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = ['Sales', 'IT', 'HR', 'Finance', 'Operations', 'Marketing'];
        $roles = ['Manager', 'Senior Developer', 'Junior Developer', 'Analyst', 'Coordinator', 'Specialist', 'Consultant'];
        $statuses = ['active', 'inactive', 'on_leave', 'terminated'];

        $users = User::all();

        $employees = [
            [
                'user_id' => $users->first()->user_id,
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'department' => 'IT',
                'job_role' => 'Senior Developer',
                'address' => '100 Tech Street, Dev City',
                'contact_no' => '111-222-3333',
                'status' => 'active',
            ],
            [
                'user_id' => $users->skip(1)->first()->user_id,
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'department' => 'HR',
                'job_role' => 'HR Manager',
                'address' => '200 People Avenue, HR Town',
                'contact_no' => '222-333-4444',
                'status' => 'active',
            ],
            [
                'user_id' => $users->skip(2)->first()->user_id,
                'name' => 'Michael Chen',
                'email' => 'michael.chen@example.com',
                'department' => 'Finance',
                'job_role' => 'Financial Analyst',
                'address' => '300 Money Lane, Finance City',
                'contact_no' => '333-444-5555',
                'status' => 'active',
            ],
            [
                'user_id' => null,
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'department' => 'Sales',
                'job_role' => 'Sales Manager',
                'address' => '400 Commerce Drive, Sales Town',
                'contact_no' => '444-555-6666',
                'status' => 'active',
            ],
            [
                'user_id' => null,
                'name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'department' => 'Operations',
                'job_role' => 'Operations Coordinator',
                'address' => '500 Operations Park, Ops City',
                'contact_no' => '555-666-7777',
                'status' => 'active',
            ],
            [
                'user_id' => null,
                'name' => 'Jessica Martinez',
                'email' => 'jessica.martinez@example.com',
                'department' => 'Marketing',
                'job_role' => 'Marketing Specialist',
                'address' => '600 Marketing Avenue, Marketing Town',
                'contact_no' => '666-777-8888',
                'status' => 'active',
            ],
            [
                'user_id' => null,
                'name' => 'Robert Brown',
                'email' => 'robert.brown@example.com',
                'department' => 'IT',
                'job_role' => 'Junior Developer',
                'address' => '700 Code Lane, Dev City',
                'contact_no' => '777-888-9999',
                'status' => 'active',
            ],
            [
                'user_id' => null,
                'name' => 'Amanda Taylor',
                'email' => 'amanda.taylor@example.com',
                'department' => 'Finance',
                'job_role' => 'Accountant',
                'address' => '800 Accounting Street, Finance City',
                'contact_no' => '888-999-0000',
                'status' => 'inactive',
            ],
            [
                'user_id' => null,
                'name' => 'Christopher Lee',
                'email' => 'christopher.lee@example.com',
                'department' => 'HR',
                'job_role' => 'Recruiter',
                'address' => '900 Hiring Drive, HR Town',
                'contact_no' => '999-000-1111',
                'status' => 'on_leave',
            ],
            [
                'user_id' => null,
                'name' => 'Lisa Anderson',
                'email' => 'lisa.anderson@example.com',
                'department' => 'Operations',
                'job_role' => 'Operations Manager',
                'address' => '1000 Management Road, Ops City',
                'contact_no' => '000-111-2222',
                'status' => 'active',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
