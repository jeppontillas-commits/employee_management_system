<?php

namespace App\Http\Controllers;

use App\Models\AuditRecord;
use App\Models\Employee;
use Illuminate\Http\Request;

class AuditRecordController extends Controller
{
    /**
     * Display a listing of audit records
     */
    public function index()
    {
        $records = AuditRecord::with('employee')->paginate(15);
        return view('audit_records.index', compact('records'));
    }

    /**
     * Show the form for creating a new audit record
     */
    public function create()
    {
        $employees = Employee::all();
        return view('audit-records.create', compact('employees'));
    }

    /**
     * Store a newly created audit record in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'action_description' => 'nullable|max:1000',
            'action_date' => 'required|date_format:Y-m-d H:i:s',
            'validated' => 'boolean',
        ]);

        $record = AuditRecord::create($validated);

        return redirect()->route('audit-records.show', $record->audit_id)
                        ->with('success', 'Audit record created successfully!');
    }

    /**
     * Display the specified audit record
     */
    public function show(AuditRecord $auditRecord)
    {
        return view('audit_records.show', ['auditRecord' => $auditRecord->load('employee')]);
    }

    /**
     * Show the form for editing the specified record
     */
    public function edit(AuditRecord $auditRecord)
    {
        return view('audit-records.edit', compact('auditRecord'));
    }

    /**
     * Update the specified audit record in storage
     */
    public function update(Request $request, AuditRecord $auditRecord)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'action_description' => 'nullable|max:1000',
            'action_date' => 'required|date_format:Y-m-d H:i:s',
            'validated' => 'boolean',
        ]);

        $auditRecord->update($validated);

        return redirect()->route('audit-records.show', $auditRecord->audit_id)
                        ->with('success', 'Audit record updated successfully!');
    }

    /**
     * Remove the specified audit record from storage
     */
    public function destroy(AuditRecord $auditRecord)
    {
        $auditRecord->delete();

        return redirect()->route('audit-records.index')
                        ->with('success', 'Audit record deleted successfully!');
    }

    /**
     * Get audit records for a specific employee
     */
    public function employeeAudits($employeeId)
    {
        $records = AuditRecord::where('employee_id', $employeeId)
            ->with('employee')
            ->paginate(15);

        return response()->json($records, Response::HTTP_OK);
    }
}
