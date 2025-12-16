@extends('layouts.app')

@section('title', 'Deletion Log Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-trash"></i> Deletion Log Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('deletion-logs.index') }}">Deletion Logs</a></li>
                    <li class="breadcrumb-item active">Log #{{ $deletionLog->deletion_id }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('deletion-logs.edit', $deletionLog->deletion_id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('deletion-logs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Log Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Deletion ID</h6>
                            <p class="h5"><strong>#{{ $deletionLog->deletion_id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Employee</h6>
                            <p>
                                <a href="{{ route('employees.show', $deletionLog->employee->employee_id) }}">
                                    {{ $deletionLog->employee->name }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Verified</h6>
                            <p>
                                <span class="badge {{ $deletionLog->verified ? 'bg-success' : 'bg-warning' }}">
                                    {{ $deletionLog->verified ? 'Yes' : 'No' }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Validated By</h6>
                            <p>
                                @if($deletionLog->validatedByUser)
                                    <a href="{{ route('users.show', $deletionLog->validatedByUser->user_id) }}">
                                        {{ $deletionLog->validatedByUser->user_name }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-2">Dependency Information</h6>
                            <p>{{ $deletionLog->dependency ?? 'No dependencies recorded' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Timestamp</h6>
                            <p>{{ $deletionLog->timestamp->format('M d, Y H:i:s') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p>{{ $deletionLog->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Updated</h6>
                            <p>{{ $deletionLog->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
