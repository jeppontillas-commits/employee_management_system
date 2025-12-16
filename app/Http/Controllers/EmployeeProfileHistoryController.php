<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfileHistory;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeProfileHistoryController extends Controller
{
    /**
     * Display a listing of profile histories
     */
    public function index()
    {
        $histories = EmployeeProfileHistory::with('employee')->paginate(15);
        return view('employee_profile_histories.index', compact('histories'));
    }

    /**
     * Show the form for creating a new history record
     */
    public function create()
    {
        $employees = Employee::all();
        return view('employee_profile_histories.create', compact('employees'));
    }

    /**
     * Store a newly created history record in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'contact_no' => 'required|max:20',
            'history_data' => 'nullable|max:5000',
            'changed_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $history = EmployeeProfileHistory::create($validated);

        return redirect()->route('employee-profile-histories.show', $history->id)
                        ->with('success', 'Profile history created successfully!');
    }

    /**
     * Display the specified history record
     */
    public function show(EmployeeProfileHistory $employeeProfileHistory)
    {
        return view('employee_profile_histories.show', ['employeeProfileHistory' => $employeeProfileHistory->load('employee')]);
    }

    /**
     * Show the form for editing the specified record
     */
    public function edit(EmployeeProfileHistory $employeeProfileHistory)
    {
        $employees = Employee::all();
        return view('employee_profile_histories.edit', compact('employeeProfileHistory', 'employees'));
    }

    /**
     * Update the specified history record in storage
     */
    public function update(Request $request, EmployeeProfileHistory $employeeProfileHistory)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'contact_no' => 'required|max:20',
            'history_data' => 'nullable|max:5000',
            'changed_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $employeeProfileHistory->update($validated);

        return redirect()->route('employee-profile-histories.show', $employeeProfileHistory->id)
                        ->with('success', 'Profile history updated successfully!');
    }

    /**
     * Remove the specified history record from storage
     */
    public function destroy(EmployeeProfileHistory $employeeProfileHistory)
    {
        $employeeProfileHistory->delete();

        return redirect()->route('employee-profile-histories.index')
                        ->with('success', 'Profile history deleted successfully!');
    }

    /**
     * Get history records for a specific employee
     */
    public function employeeHistory($employeeId)
    {
        $histories = EmployeeProfileHistory::where('employee_id', $employeeId)
            ->with('employee')
            ->orderBy('changed_date', 'desc')
            ->paginate(15);

        return view('employee_profile_histories.index', ['histories' => $histories, 'filter' => "Employee ID: {$employeeId}"]);
    }
}
