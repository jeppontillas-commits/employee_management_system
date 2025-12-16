<?php

namespace App\Http\Controllers;

use App\Models\DeletionLog;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DeletionLogController extends Controller
{
    /**
     * Display a listing of deletion logs
     */
    public function index()
    {
        $logs = DeletionLog::with(['employee', 'validatedByUser'])->paginate(15);
        return view('deletion_logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new deletion log
     */
    public function create()
    {
        $employees = Employee::all();
        $users = User::all();
        return view('deletion_logs.create', compact('employees', 'users'));
    }

    /**
     * Store a newly created deletion log in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'dependency' => 'nullable|max:1000',
            'verified' => 'boolean',
            'validated_by' => 'nullable|exists:users,user_id',
        ]);

        $log = DeletionLog::create($validated);

        return redirect()->route('deletion-logs.show', $log->deletion_id)
                        ->with('success', 'Deletion log created successfully!');
    }

    /**
     * Display the specified deletion log
     */
    public function show(DeletionLog $deletionLog)
    {
        return view('deletion_logs.show', ['deletionLog' => $deletionLog->load(['employee', 'validatedByUser'])]);
    }

    /**
     * Show the form for editing the specified log
     */
    public function edit(DeletionLog $deletionLog)
    {
        $employees = Employee::all();
        $users = User::all();
        return view('deletion_logs.edit', compact('deletionLog', 'employees', 'users'));
    }

    /**
     * Update the specified deletion log in storage
     */
    public function update(Request $request, DeletionLog $deletionLog)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'dependency' => 'nullable|max:1000',
            'verified' => 'boolean',
            'validated_by' => 'nullable|exists:users,user_id',
        ]);

        $deletionLog->update($validated);

        return redirect()->route('deletion-logs.show', $deletionLog->deletion_id)
                        ->with('success', 'Deletion log updated successfully!');
    }

    /**
     * Remove the specified deletion log from storage
     */
    public function destroy(DeletionLog $deletionLog)
    {
        $deletionLog->delete();

        return redirect()->route('deletion-logs.index')
                        ->with('success', 'Deletion log deleted successfully!');
    }

    /**
     * Verify a deletion
     */
    public function verify(DeletionLog $deletionLog, Request $request)
    {
        $validated = $request->validate([
            'validated_by' => 'required|exists:users,user_id',
        ]);

        $deletionLog->update([
            'verified' => true,
            'validated_by' => $validated['validated_by'],
        ]);

        return redirect()->route('deletion-logs.show', $deletionLog->deletion_id)
                        ->with('success', 'Deletion log verified successfully!');
    }

    /**
     * Get unverified deletion logs
     */
    public function unverified()
    {
        $logs = DeletionLog::where('verified', false)
            ->with(['employee', 'validatedByUser'])
            ->paginate(15);

        return view('deletion_logs.index', ['logs' => $logs, 'filter' => 'Unverified Only']);
    }
}
