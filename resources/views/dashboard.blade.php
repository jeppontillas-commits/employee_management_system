@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-chart-line"></i> Dashboard</h2>

    <!-- Key Metrics Row -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Employees</h6>
                            <h2 class="mt-2">{{ \App\Models\Employee::count() }}</h2>
                        </div>
                        <i class="fas fa-id-card fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Active Employees</h6>
                            <h2 class="mt-2">{{ \App\Models\Employee::where('status', 'active')->count() }}</h2>
                        </div>
                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Users</h6>
                            <h2 class="mt-2">{{ \App\Models\User::count() }}</h2>
                        </div>
                        <i class="fas fa-users fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Pending Reports</h6>
                            <h2 class="mt-2">{{ \App\Models\Report::where('status', 'pending')->count() }}</h2>
                        </div>
                        <i class="fas fa-chart-bar fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Section -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-history"></i> Recent Profile Changes
                </div>
                <div class="card-body">
                    @php
                        $recentChanges = \App\Models\EmployeeProfileHistory::with('employee')
                            ->orderBy('changed_date', 'desc')
                            ->limit(5)
                            ->get();
                    @endphp
                    
                    @if($recentChanges->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentChanges as $change)
                                <a href="{{ route('employee-profile-histories.show', $change->id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $change->employee->name }}</h6>
                                        <small class="text-muted">{{ $change->changed_date->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1 small text-muted">{{ $change->getChangeSummary() }}</p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center py-3">No recent changes</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-file-audit"></i> Recent Audit Records
                </div>
                <div class="card-body">
                    @php
                        $recentAudits = \App\Models\AuditRecord::with('employee')
                            ->orderBy('action_date', 'desc')
                            ->limit(5)
                            ->get();
                    @endphp
                    
                    @if($recentAudits->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentAudits as $audit)
                                <a href="{{ route('audit-records.show', $audit->audit_id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $audit->employee->name }}</h6>
                                        <small class="text-muted">{{ $audit->action_date->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1 small">{{ Str::limit($audit->action_description, 60) }}</p>
                                    <span class="badge bg-{{ $audit->validated ? 'success' : 'warning' }}">
                                        {{ $audit->validated ? 'Validated' : 'Pending' }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center py-3">No recent audits</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info Row -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-exclamation-triangle"></i> System Status
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="mb-2"><strong>Pending Deletions:</strong></p>
                            <h5 class="text-danger">{{ \App\Models\DeletionLog::where('verified', false)->count() }}</h5>
                            <small class="text-muted">Awaiting verification</small>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-2"><strong>Unvalidated Audits:</strong></p>
                            <h5 class="text-warning">{{ \App\Models\AuditRecord::where('validated', false)->count() }}</h5>
                            <small class="text-muted">Awaiting validation</small>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-2"><strong>Failed Reports:</strong></p>
                            <h5 class="text-danger">{{ \App\Models\Report::where('status', 'failed')->count() }}</h5>
                            <small class="text-muted">Require attention</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
