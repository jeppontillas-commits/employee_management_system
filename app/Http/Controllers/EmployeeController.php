<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees
     */
    public function index(Request $request)
    {
        $query = Employee::with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $employees = $query->paginate(15);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created employee in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,user_id',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees',
            'department' => 'required|max:255',
            'job_role' => 'required|max:255',
            'address' => 'nullable|max:500',
            'contact_no' => 'required|max:20',
            'status' => 'required|in:active,inactive,on_leave,terminated',
        ]);

        $employee = Employee::create($validated);

        return redirect()->route('employees.show', $employee->employee_id)
                        ->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified employee
     */
    public function show(Employee $employee)
    {
        $employee->load(['user', 'auditRecords', 'profileHistories', 'deletionLog']);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified employee in storage
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,user_id',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->employee_id . ',employee_id',
            'department' => 'required|max:255',
            'job_role' => 'required|max:255',
            'address' => 'nullable|max:500',
            'contact_no' => 'required|max:20',
            'status' => 'required|in:active,inactive,on_leave,terminated',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.show', $employee->employee_id)
                        ->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified employee from storage
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
                        ->with('success', 'Employee deleted successfully!');
    }
}
