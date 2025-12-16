@extends('layouts.app')

@section('title', 'Report Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-chart-bar"></i> Report Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                    <li class="breadcrumb-item active">Report #{{ $report->report_id }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('reports.edit', $report->report_id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('reports.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Report Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Report ID</h6>
                            <p class="h5"><strong>#{{ $report->report_id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Report Type</h6>
                            <p class="h5"><strong>{{ $report->report_type }}</strong></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status</h6>
                            <p>
                                @if($report->status == 'pending')
                                    <span class="badge bg-warning badge-status">Pending</span>
                                @elseif($report->status == 'generated')
                                    <span class="badge bg-info badge-status">Generated</span>
                                @elseif($report->status == 'sent')
                                    <span class="badge bg-success badge-status">Sent</span>
                                @else
                                    <span class="badge bg-danger badge-status">Failed</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p>{{ $report->email ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Action Date</h6>
                            <p>{{ $report->action_date->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p>{{ $report->update ? $report->update->format('M d, Y H:i') : 'Not updated' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-2">Report Data</h6>
                            <p>{{ $report->report_data ?? 'No data available' }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p>{{ $report->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Updated</h6>
                            <p>{{ $report->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
