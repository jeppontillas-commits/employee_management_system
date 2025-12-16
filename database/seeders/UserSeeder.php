<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'user_name' => 'admin',
                'email' => 'admin@example.com',
                'contact_no' => '123-456-7890',
                'address' => '123 Admin Street, Management City',
                'status' => 'active',
            ],
            [
                'user_name' => 'manager1',
                'email' => 'manager1@example.com',
                'contact_no' => '234-567-8901',
                'address' => '456 Manager Ave, Business Town',
                'status' => 'active',
            ],
            [
                'user_name' => 'manager2',
                'email' => 'manager2@example.com',
                'contact_no' => '345-678-9012',
                'address' => '789 Executive Blvd, Corporate City',
                'status' => 'active',
            ],
            [
                'user_name' => 'hrstaff',
                'email' => 'hr@example.com',
                'contact_no' => '456-789-0123',
                'address' => '321 HR Plaza, People City',
                'status' => 'active',
            ],
            [
                'user_name' => 'auditor',
                'email' => 'auditor@example.com',
                'contact_no' => '567-890-1234',
                'address' => '654 Audit Lane, Compliance Town',
                'status' => 'active',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
