@extends('layouts.app')

@section('title', 'Audit Record Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-file-audit"></i> Audit Record Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('audit-records.index') }}">Audit Records</a></li>
                    <li class="breadcrumb-item active">Record #{{ $auditRecord->audit_id }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('audit-records.edit', $auditRecord->audit_id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('audit-records.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Record Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Audit ID</h6>
                            <p class="h5"><strong>#{{ $auditRecord->audit_id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Employee</h6>
                            <p>
                                <a href="{{ route('employees.show', $auditRecord->employee->employee_id) }}">
                                    {{ $auditRecord->employee->name }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Action Date</h6>
                            <p>{{ $auditRecord->action_date->format('M d, Y H:i:s') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Validated</h6>
                            <p>
                                <span class="badge {{ $auditRecord->validated ? 'bg-success' : 'bg-warning' }}">
                                    {{ $auditRecord->validated ? 'Yes' : 'No' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-2">Action Description</h6>
                            <p>{{ $auditRecord->action_description ?? 'No description provided' }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p>{{ $auditRecord->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p>{{ $auditRecord->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
