<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $currentUser = $users->first();

        $settings = [
            [
                'setting_type' => 'app_name',
                'setting_value' => 'Employee Management System',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'app_version',
                'setting_value' => '1.0.0',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'company_name',
                'setting_value' => 'Tech Solutions Inc.',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'company_email',
                'setting_value' => 'hr@techsolutions.com',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'company_phone',
                'setting_value' => '+1-800-TECH-101',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'company_address',
                'setting_value' => '1000 Innovation Drive, Tech City, TC 12345',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'max_employees',
                'setting_value' => '500',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'max_leave_days',
                'setting_value' => '20',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'payroll_frequency',
                'setting_value' => 'monthly',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'currency',
                'setting_value' => 'USD',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'timezone',
                'setting_value' => 'America/New_York',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'date_format',
                'setting_value' => 'MM/DD/YYYY',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'audit_trail_enabled',
                'setting_value' => 'true',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'auto_backup_enabled',
                'setting_value' => 'true',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'email_notifications_enabled',
                'setting_value' => 'true',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'report_generation_time',
                'setting_value' => '02:00',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'password_expiry_days',
                'setting_value' => '90',
                'modified_by' => $currentUser->user_id,
            ],
            [
                'setting_type' => 'session_timeout_minutes',
                'setting_value' => '30',
                'modified_by' => $currentUser->user_id,
            ],
        ];

        foreach ($settings as $setting) {
            SystemSetting::create(array_merge($setting, [
                'modified_date' => now(),
            ]));
        }
    }
}
