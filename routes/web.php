<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\AuditRecordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeeProfileHistoryController;
use App\Http\Controllers\DeletionLogController;

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Public routes
Route::get('/test', function () {
    return response()->json(['message' => 'Database connection successful!']);
});

// Main routes (no authentication required for testing)
// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// User Management Routes
Route::resource('users', UserController::class);

// Employee Management Routes
Route::resource('employees', EmployeeController::class);

// Audit Records Routes
Route::resource('audit-records', AuditRecordController::class);
Route::get('/audit-records/employee/{employeeId}', [AuditRecordController::class, 'employeeAudits'])->name('audit-records.employee');

// Reports Routes
Route::resource('reports', ReportController::class);
Route::get('/reports/status/{status}', [ReportController::class, 'getByStatus'])->name('reports.status');
Route::get('/reports/type/{type}', [ReportController::class, 'getByType'])->name('reports.type');

// Employee Profile History Routes
Route::resource('employee-profile-histories', EmployeeProfileHistoryController::class);
Route::get('/employee-profile-histories/employee/{employeeId}', [EmployeeProfileHistoryController::class, 'employeeHistory'])->name('employee-profile-histories.employee');

// Deletion Logs Routes
Route::resource('deletion-logs', DeletionLogController::class);
Route::post('/deletion-logs/{deletionLog}/verify', [DeletionLogController::class, 'verify'])->name('deletion-logs.verify');
Route::get('/deletion-logs/unverified', [DeletionLogController::class, 'unverified'])->name('deletion-logs.unverified');

// System Settings Routes
Route::resource('system-settings', SystemSettingController::class);
