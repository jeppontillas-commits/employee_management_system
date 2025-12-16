-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 04:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_records`
--

CREATE TABLE `audit_records` (
  `audit_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `action_description` text DEFAULT NULL,
  `action_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `validated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_records`
--

INSERT INTO `audit_records` (`audit_id`, `employee_id`, `action_description`, `action_date`, `validated`, `created_at`, `updated_at`) VALUES
(1, 1, 'Security clearance renewed', '2025-09-29 18:19:10', 1, '2025-12-12 18:19:10', '2025-12-12 18:19:10'),
(2, 1, 'Background check verified', '2025-09-26 18:19:10', 1, '2025-12-12 18:19:10', '2025-12-12 18:19:10'),
(3, 1, 'Employee contact information updated', '2025-09-25 18:19:10', 1, '2025-12-12 18:19:10', '2025-12-12 18:19:10'),
(4, 2, 'Project assignment updated', '2025-10-31 18:19:10', 1, '2025-12-12 18:19:10', '2025-12-12 18:19:10'),
(5, 2, 'Performance review completed', '2025-09-22 18:19:13', 0, '2025-12-12 18:19:13', '2025-12-12 18:19:13'),
(6, 2, 'Employee department changed from IT to Finance', '2025-11-07 18:19:15', 0, '2025-12-12 18:19:15', '2025-12-12 18:19:15'),
(7, 3, 'Employee emergency contact updated', '2025-09-25 18:19:15', 1, '2025-12-12 18:19:15', '2025-12-12 18:19:15'),
(8, 3, 'Employment contract renewed', '2025-09-24 18:19:15', 0, '2025-12-12 18:19:15', '2025-12-12 18:19:15'),
(9, 4, 'Certification added to employee record', '2025-12-11 18:19:16', 1, '2025-12-12 18:19:16', '2025-12-12 18:19:16'),
(10, 4, 'Employee salary adjustment approved', '2025-10-09 18:19:16', 0, '2025-12-12 18:19:16', '2025-12-12 18:19:16'),
(11, 4, 'Security clearance renewed', '2025-09-24 18:19:16', 0, '2025-12-12 18:19:16', '2025-12-12 18:19:16'),
(12, 5, 'Employee status changed to on_leave', '2025-11-02 18:19:16', 0, '2025-12-12 18:19:16', '2025-12-12 18:19:16'),
(13, 5, 'Performance review completed', '2025-09-29 18:19:16', 1, '2025-12-12 18:19:16', '2025-12-12 18:19:16'),
(14, 5, 'Project assignment updated', '2025-12-06 18:19:16', 0, '2025-12-12 18:19:16', '2025-12-12 18:19:16'),
(15, 6, 'Employee emergency contact updated', '2025-10-22 18:19:18', 1, '2025-12-12 18:19:18', '2025-12-12 18:19:18'),
(16, 6, 'Background check verified', '2025-11-26 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(17, 6, 'Employee emergency contact updated', '2025-11-20 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(18, 6, 'Training completion recorded', '2025-09-19 18:19:19', 1, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(19, 7, 'Security clearance renewed', '2025-12-11 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(20, 7, 'Employment contract renewed', '2025-11-13 18:19:19', 1, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(21, 7, 'Employee status changed to on_leave', '2025-12-08 18:19:19', 1, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(22, 7, 'Employee benefit enrollment completed', '2025-11-19 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(23, 7, 'Employee status changed to on_leave', '2025-12-05 18:19:19', 1, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(24, 8, 'Employee profile updated - Name changed', '2025-12-08 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(25, 8, 'Employee benefit enrollment completed', '2025-09-17 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(26, 8, 'Employee contact information updated', '2025-11-08 18:19:19', 0, '2025-12-12 18:19:19', '2025-12-12 18:19:19'),
(27, 9, 'Employee profile updated - Name changed', '2025-11-12 18:19:20', 0, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(28, 9, 'Performance review completed', '2025-11-15 18:19:20', 0, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(29, 9, 'Employee promoted to Senior Developer', '2025-10-21 18:19:20', 0, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(30, 9, 'Employee department changed from IT to Finance', '2025-11-12 18:19:20', 1, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(31, 10, 'Employment contract renewed', '2025-12-01 18:19:20', 0, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(32, 10, 'Project assignment updated', '2025-10-31 18:19:20', 1, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(33, 10, 'Employee contact information updated', '2025-12-01 18:19:20', 0, '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(34, 10, 'Background check verified', '2025-11-09 18:19:20', 1, '2025-12-12 18:19:20', '2025-12-12 18:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `deletion_logs`
--

CREATE TABLE `deletion_logs` (
  `deletion_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `dependency` text DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `validated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deletion_logs`
--

INSERT INTO `deletion_logs` (`deletion_id`, `employee_id`, `dependency`, `verified`, `validated_by`, `timestamp`, `created_at`, `updated_at`) VALUES
(1, 5, 'No active projects, All audit records archived, Email account deactivated, No pending approvals', 1, 2, '2025-10-30 18:19:22', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(2, 4, 'All audit records archived, Email account deactivated', 0, 2, '2025-12-08 18:19:23', '2025-12-12 18:19:23', '2025-12-12 18:19:23'),
(3, 9, 'No active projects, Email account deactivated, No pending leave, No pending approvals', 1, 1, '2025-12-01 18:19:23', '2025-12-12 18:19:23', '2025-12-12 18:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `job_role` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `contact_no` varchar(255) NOT NULL,
  `status` enum('active','inactive','on_leave','terminated') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `user_id`, `name`, `email`, `department`, `job_role`, `address`, `contact_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Smith', 'john.smith@example.com', 'IT', 'Senior Developer', '100 Tech Street, Dev City', '111-222-3333', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(2, 2, 'Sarah Johnson', 'sarah.johnson@example.com', 'HR', 'HR Manager', '200 People Avenue, HR Town', '222-333-4444', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(3, 3, 'Michael Chen', 'michael.chen@example.com', 'Finance', 'Financial Analyst', '300 Money Lane, Finance City', '333-444-5555', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(4, NULL, 'Emily Davis', 'emily.davis@example.com', 'Sales', 'Sales Manager', '400 Commerce Drive, Sales Town', '444-555-6666', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(5, NULL, 'David Wilson', 'david.wilson@example.com', 'Operations', 'Operations Coordinator', '500 Operations Park, Ops City', '555-666-7777', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(6, NULL, 'Jessica Martinez', 'jessica.martinez@example.com', 'Marketing', 'Marketing Specialist', '600 Marketing Avenue, Marketing Town', '666-777-8888', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(7, NULL, 'Robert Brown', 'robert.brown@example.com', 'IT', 'Junior Developer', '700 Code Lane, Dev City', '777-888-9999', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(8, NULL, 'Amanda Taylor', 'amanda.taylor@example.com', 'Finance', 'Accountant', '800 Accounting Street, Finance City', '888-999-0000', 'inactive', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(9, NULL, 'Christopher Lee', 'christopher.lee@example.com', 'HR', 'Recruiter', '900 Hiring Drive, HR Town', '999-000-1111', 'on_leave', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(10, NULL, 'Lisa Anderson', 'lisa.anderson@example.com', 'Operations', 'Operations Manager', '1000 Management Road, Ops City', '000-111-2222', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `employee_profile_histories`
--

CREATE TABLE `employee_profile_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `history_data` text DEFAULT NULL,
  `changed_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_profile_histories`
--

INSERT INTO `employee_profile_histories` (`id`, `employee_id`, `name`, `email`, `contact_no`, `history_data`, `changed_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Smith', 'john.smith@example.com', '111-222-3333', '{\"change_type\":\"Work location change\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-10-24 18:19:20', '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(2, 1, 'John Smith', 'john.smith@example.com', '111-222-3333', '{\"change_type\":\"Email address changed\",\"changed_from\":\"Previous value 2\",\"changed_to\":\"New value 2\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-07 18:19:20', '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(3, 1, 'John Smith', 'john.smith@example.com', '111-222-3333', '{\"change_type\":\"Address relocation\",\"changed_from\":\"Previous value 3\",\"changed_to\":\"New value 3\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-11-08 18:19:20', '2025-12-12 18:19:20', '2025-12-12 18:19:20'),
(4, 2, 'Sarah Johnson', 'sarah.johnson@example.com', '222-333-4444', '{\"change_type\":\"Address relocation\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-20 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(5, 3, 'Michael Chen', 'michael.chen@example.com', '333-444-5555', '{\"change_type\":\"Phone number correction\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-08-22 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(6, 4, 'Emily Davis', 'emily.davis@example.com', '444-555-6666', '{\"change_type\":\"Phone number correction\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-11-02 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(7, 4, 'Emily Davis', 'emily.davis@example.com', '444-555-6666', '{\"change_type\":\"Email address changed\",\"changed_from\":\"Previous value 2\",\"changed_to\":\"New value 2\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-11-13 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(8, 4, 'Emily Davis', 'emily.davis@example.com', '444-555-6666', '{\"change_type\":\"Mailing address update\",\"changed_from\":\"Previous value 3\",\"changed_to\":\"New value 3\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-11-04 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(9, 5, 'David Wilson', 'david.wilson@example.com', '555-666-7777', '{\"change_type\":\"Address relocation\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-11-19 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(10, 6, 'Jessica Martinez', 'jessica.martinez@example.com', '666-777-8888', '{\"change_type\":\"Emergency contact change\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-11 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(11, 7, 'Robert Brown', 'robert.brown@example.com', '777-888-9999', '{\"change_type\":\"Phone number correction\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-08-26 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(12, 7, 'Robert Brown', 'robert.brown@example.com', '777-888-9999', '{\"change_type\":\"Work location change\",\"changed_from\":\"Previous value 2\",\"changed_to\":\"New value 2\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-14 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(13, 8, 'Amanda Taylor', 'amanda.taylor@example.com', '888-999-0000', '{\"change_type\":\"Department transfer\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-21 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(14, 8, 'Amanda Taylor', 'amanda.taylor@example.com', '888-999-0000', '{\"change_type\":\"Department transfer\",\"changed_from\":\"Previous value 2\",\"changed_to\":\"New value 2\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-24 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(15, 9, 'Christopher Lee', 'christopher.lee@example.com', '999-000-1111', '{\"change_type\":\"Name change due to marriage\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-10-22 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(16, 9, 'Christopher Lee', 'christopher.lee@example.com', '999-000-1111', '{\"change_type\":\"Contact number updated\",\"changed_from\":\"Previous value 2\",\"changed_to\":\"New value 2\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-11-16 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(17, 10, 'Lisa Anderson', 'lisa.anderson@example.com', '000-111-2222', '{\"change_type\":\"Mailing address update\",\"changed_from\":\"Previous value 1\",\"changed_to\":\"New value 1\",\"change_reason\":\"Employee request \\/ Administrative update \\/ System correction\",\"old_department\":\"Previous Department\",\"new_department\":\"New Department\"}', '2025-09-05 18:19:21', '2025-12-12 18:19:21', '2025-12-12 18:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_12_12_000001_create_users_table', 1),
(2, '2025_12_12_000002_create_employees_table', 1),
(3, '2025_12_12_000003_create_system_settings_table', 1),
(4, '2025_12_12_000004_create_audit_records_table', 1),
(5, '2025_12_12_000005_create_reports_table', 1),
(6, '2025_12_12_000006_create_employee_profile_histories_table', 1),
(7, '2025_12_12_000007_create_deletion_logs_table', 1),
(8, '2025_12_12_000008_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `email` varchar(255) DEFAULT NULL,
  `status` enum('pending','generated','sent','failed') NOT NULL DEFAULT 'pending',
  `report_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_type`, `action_date`, `update`, `email`, `status`, `report_data`, `created_at`, `updated_at`) VALUES
(1, 'Monthly Payroll Report', '2025-10-29 18:19:21', '2025-12-03 18:19:21', 'admin@example.com', 'pending', '{\"total_records\":68,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(2, 'Employee Directory Report', '2025-11-02 18:19:21', NULL, 'hr@example.com', 'sent', '{\"total_records\":438,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(3, 'Attendance Report', '2025-10-23 18:19:21', '2025-12-01 18:19:21', 'hr@example.com', 'generated', '{\"total_records\":362,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:21', '2025-12-12 18:19:21'),
(4, 'Department Summary Report', '2025-11-24 18:19:22', NULL, 'manager2@example.com', 'failed', '{\"total_records\":294,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(5, 'Salary Analysis Report', '2025-10-25 18:19:22', '2025-11-29 18:19:22', 'manager2@example.com', 'sent', '{\"total_records\":482,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(6, 'Performance Review Report', '2025-11-23 18:19:22', NULL, 'finance@example.com', 'generated', '{\"total_records\":481,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(7, 'Employee Status Report', '2025-11-02 18:19:22', '2025-12-08 18:19:22', 'manager1@example.com', 'pending', '{\"total_records\":426,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(8, 'HR Compliance Report', '2025-10-20 18:19:22', NULL, 'hr@example.com', 'sent', '{\"total_records\":431,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(9, 'Training Report', '2025-11-21 18:19:22', '2025-11-17 18:19:22', 'finance@example.com', 'generated', '{\"total_records\":295,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(10, 'Vacation Days Report', '2025-12-03 18:19:22', '2025-11-25 18:19:22', 'finance@example.com', 'pending', '{\"total_records\":36,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(11, 'Benefits Summary Report', '2025-12-06 18:19:22', NULL, 'manager2@example.com', 'sent', '{\"total_records\":445,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(12, 'Hiring Pipeline Report', '2025-12-09 18:19:22', NULL, 'finance@example.com', 'failed', '{\"total_records\":139,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(13, 'Employee Turnover Report', '2025-12-09 18:19:22', '2025-12-05 18:19:22', 'manager1@example.com', 'pending', '{\"total_records\":316,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(14, 'Skills Inventory Report', '2025-11-21 18:19:22', NULL, 'admin@example.com', 'failed', '{\"total_records\":230,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":false}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(15, 'Promotion History Report', '2025-12-04 18:19:22', '2025-11-14 18:19:22', 'hr@example.com', 'pending', '{\"total_records\":196,\"period\":\"Monthly\",\"generated_by\":\"System Scheduler\",\"includes_details\":true}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(16, 'Promotion History Report', '2025-12-05 18:19:22', NULL, 'finance@example.com', 'sent', '{\"total_records\":338,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(17, 'Attendance Report', '2025-10-05 18:19:22', NULL, 'manager2@example.com', 'failed', '{\"total_records\":482,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(18, 'Training Report', '2025-10-17 18:19:22', NULL, 'admin@example.com', 'pending', '{\"total_records\":479,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(19, 'Department Summary Report', '2025-10-29 18:19:22', NULL, 'finance@example.com', 'sent', '{\"total_records\":781,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(20, 'Monthly Payroll Report', '2025-10-10 18:19:22', '2025-12-09 18:19:22', 'hr@example.com', 'failed', '{\"total_records\":36,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(21, 'Hiring Pipeline Report', '2025-10-10 18:19:22', NULL, 'manager2@example.com', 'failed', '{\"total_records\":888,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(22, 'Skills Inventory Report', '2025-11-22 18:19:22', '2025-11-15 18:19:22', 'finance@example.com', 'generated', '{\"total_records\":735,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(23, 'Training Report', '2025-10-12 18:19:22', NULL, 'manager1@example.com', 'generated', '{\"total_records\":690,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(24, 'Skills Inventory Report', '2025-09-24 18:19:22', NULL, 'manager2@example.com', 'failed', '{\"total_records\":386,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22'),
(25, 'Salary Analysis Report', '2025-11-24 18:19:22', '2025-11-14 18:19:22', 'admin@example.com', 'generated', '{\"total_records\":796,\"period\":\"Monthly\",\"generated_by\":\"Manual Request\"}', '2025-12-12 18:19:22', '2025-12-12 18:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bLKgbV1RdohAaW3WedcJDHQKScSLvHdztyolZBU8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkdBRHFpRWNGTzhSMUJzSm1hQ01aOXlFUzlRT1VrMGdZYzFFQTRJcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZXMiO3M6NToicm91dGUiO3M6MTU6ImVtcGxveWVlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765595531),
('yiModOa85Un7c23S6b17RSqPElYHsjRl89CeJPot', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0ZJbzc3MzVMZVIxaDZXcVFHU2lPUmdTdkVpM3JGaXU5S21XMkE2dSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZXMiO3M6NToicm91dGUiO3M6MTU6ImVtcGxveWVlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765768039);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `setting_type` varchar(255) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `modified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`setting_id`, `setting_type`, `setting_value`, `modified_by`, `modified_date`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Employee Management System', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(2, 'app_version', '1.0.0', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(3, 'company_name', 'Tech Solutions Inc.', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(4, 'company_email', 'hr@techsolutions.com', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(5, 'company_phone', '+1-800-TECH-101', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(6, 'company_address', '1000 Innovation Drive, Tech City, TC 12345', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(7, 'max_employees', '500', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(8, 'max_leave_days', '20', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(9, 'payroll_frequency', 'monthly', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(10, 'currency', 'USD', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(11, 'timezone', 'America/New_York', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(12, 'date_format', '10/14/2004', 1, '2025-12-12 19:00:51', '2025-12-12 18:19:09', '2025-12-12 19:00:51'),
(13, 'audit_trail_enabled', 'true', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(14, 'auto_backup_enabled', 'true', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(15, 'email_notifications_enabled', 'true', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(16, 'report_generation_time', '02:00', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(17, 'password_expiry_days', '90', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(18, 'session_timeout_minutes', '30', 1, '2025-12-12 18:19:09', '2025-12-12 18:19:09', '2025-12-12 18:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `status` enum('active','inactive','suspended') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `contact_no`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123-456-7890', 'admin@example.com', '123 Admin Street, Management City', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(2, 'manager1', '234-567-8901', 'manager1@example.com', '456 Manager Ave, Business Town', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(3, 'manager2', '345-678-9012', 'manager2@example.com', '789 Executive Blvd, Corporate City', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(4, 'hrstaff', '456-789-0123', 'hr@example.com', '321 HR Plaza, People City', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09'),
(5, 'auditor', '567-890-1234', 'auditor@example.com', '654 Audit Lane, Compliance Town', 'active', '2025-12-12 18:19:09', '2025-12-12 18:19:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_records`
--
ALTER TABLE `audit_records`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `audit_records_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `deletion_logs`
--
ALTER TABLE `deletion_logs`
  ADD PRIMARY KEY (`deletion_id`),
  ADD KEY `deletion_logs_employee_id_foreign` (`employee_id`),
  ADD KEY `deletion_logs_validated_by_foreign` (`validated_by`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `employee_profile_histories`
--
ALTER TABLE `employee_profile_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_profile_histories_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `system_settings_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_records`
--
ALTER TABLE `audit_records`
  MODIFY `audit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `deletion_logs`
--
ALTER TABLE `deletion_logs`
  MODIFY `deletion_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_profile_histories`
--
ALTER TABLE `employee_profile_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `setting_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_records`
--
ALTER TABLE `audit_records`
  ADD CONSTRAINT `audit_records_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `deletion_logs`
--
ALTER TABLE `deletion_logs`
  ADD CONSTRAINT `deletion_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deletion_logs_validated_by_foreign` FOREIGN KEY (`validated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `employee_profile_histories`
--
ALTER TABLE `employee_profile_histories`
  ADD CONSTRAINT `employee_profile_histories_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD CONSTRAINT `system_settings_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
