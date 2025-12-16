@extends('layouts.app')

@section('title', 'Profile History Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-history"></i> History Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employee-profile-histories.index') }}">Profile History</a></li>
                    <li class="breadcrumb-item active">History #{{ $employeeProfileHistory->id }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('employee-profile-histories.edit', $employeeProfileHistory->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('employee-profile-histories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> History Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">History ID</h6>
                            <p class="h5"><strong>#{{ $employeeProfileHistory->id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Employee</h6>
                            <p>
                                <a href="{{ route('employees.show', $employeeProfileHistory->employee->employee_id) }}">
                                    {{ $employeeProfileHistory->employee->name }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Name</h6>
                            <p>{{ $employeeProfileHistory->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p>{{ $employeeProfileHistory->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Contact Number</h6>
                            <p>{{ $employeeProfileHistory->contact_no }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Changed Date</h6>
                            <p>{{ $employeeProfileHistory->changed_date->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    @if($employeeProfileHistory->history_data)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6 class="text-muted mb-2"><i class="fas fa-exchange-alt"></i> Changes Tracked</h6>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        @php
                                            $historyData = is_string($employeeProfileHistory->history_data) 
                                                ? json_decode($employeeProfileHistory->history_data, true) 
                                                : $employeeProfileHistory->history_data;
                                        @endphp
                                        
                                        @if(is_array($historyData) && count($historyData) > 0)
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th style="width: 20%;">Field</th>
                                                            <th style="width: 40%;">Previous Value</th>
                                                            <th style="width: 40%;">New Value</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($historyData as $field => $change)
                                                            <tr>
                                                                <td><strong>{{ ucfirst(str_replace('_', ' ', $field)) }}</strong></td>
                                                                <td>
                                                                    <code class="bg-danger-subtle p-2 rounded d-inline-block">
                                                                        {{ $change['old'] ?? 'N/A' }}
                                                                    </code>
                                                                </td>
                                                                <td>
                                                                    <code class="bg-success-subtle p-2 rounded d-inline-block">
                                                                        {{ $change['new'] ?? 'N/A' }}
                                                                    </code>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p class="text-muted mb-0">No specific changes tracked for this record.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p>{{ $employeeProfileHistory->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Updated</h6>
                            <p>{{ $employeeProfileHistory->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
