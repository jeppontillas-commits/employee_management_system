<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of reports
     */
    public function index()
    {
        $reports = Report::paginate(15);
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new report
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created report in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'report_type' => 'required|max:255',
            'action_date' => 'required|date_format:Y-m-d H:i:s',
            'email' => 'nullable|email',
            'status' => 'required|in:pending,generated,sent,failed',
            'report_data' => 'nullable|max:5000',
        ]);

        $report = Report::create($validated);

        return redirect()->route('reports.show', $report->report_id)
                        ->with('success', 'Report created successfully!');
    }

    /**
     * Display the specified report
     */
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified report
     */
    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified report in storage
     */
    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'report_type' => 'required|max:255',
            'action_date' => 'required|date_format:Y-m-d H:i:s',
            'email' => 'nullable|email',
            'status' => 'required|in:pending,generated,sent,failed',
            'report_data' => 'nullable|max:5000',
        ]);

        $report->update($validated);

        return redirect()->route('reports.show', $report->report_id)
                        ->with('success', 'Report updated successfully!');
    }

    /**
     * Remove the specified report from storage
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')
                        ->with('success', 'Report deleted successfully!');
    }

    /**
     * Get reports by status
     */
    public function getByStatus($status)
    {
        $reports = Report::where('status', $status)->paginate(15);
        return view('reports.index', ['reports' => $reports, 'filter' => "Status: {$status}"]);
    }

    /**
     * Get reports by type
     */
    public function getByType($type)
    {
        $reports = Report::where('report_type', $type)->paginate(15);
        return view('reports.index', ['reports' => $reports, 'filter' => "Type: {$type}"]);
    }
}
