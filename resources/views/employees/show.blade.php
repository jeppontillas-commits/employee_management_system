@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-id-card"></i> Employee Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
                    <li class="breadcrumb-item active">{{ $employee->name }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('employees.edit', $employee->employee_id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Employee Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Employee ID</h6>
                            <p class="h5"><strong>#{{ $employee->employee_id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Full Name</h6>
                            <p class="h5"><strong>{{ $employee->name }}</strong></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p>{{ $employee->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Contact Number</h6>
                            <p>{{ $employee->contact_no }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Department</h6>
                            <p>{{ $employee->department }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Job Role</h6>
                            <p>{{ $employee->job_role }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status</h6>
                            <p>
                                @if($employee->status == 'active')
                                    <span class="badge bg-success badge-status">Active</span>
                                @elseif($employee->status == 'inactive')
                                    <span class="badge bg-warning badge-status">Inactive</span>
                                @elseif($employee->status == 'on_leave')
                                    <span class="badge bg-info badge-status">On Leave</span>
                                @else
                                    <span class="badge bg-danger badge-status">Terminated</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created Date</h6>
                            <p>{{ $employee->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-2">Address</h6>
                            <p>{{ $employee->address ?? 'Not provided' }}</p>
                        </div>
                    </div>

                    @if($employee->user)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6 class="text-muted mb-2">Associated User</h6>
                                <p>
                                    <a href="{{ route('users.show', $employee->user->user_id) }}">
                                        {{ $employee->user->user_name }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if($employee->profileHistories->count())
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="fas fa-history"></i> Profile History ({{ $employee->profileHistories->count() }})
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date Changed</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee->profileHistories->take(5) as $history)
                                        <tr>
                                            <td>{{ $history->changed_date->format('M d, Y H:i') }}</td>
                                            <td>{{ $history->name }}</td>
                                            <td>{{ $history->email }}</td>
                                            <td>{{ $history->contact_no }}</td>
                                            <td>
                                                <a href="{{ route('employee-profile-histories.show', $history->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($employee->profileHistories->count() > 5)
                            <a href="{{ route('employee-profile-histories.employee', $employee->employee_id) }}" class="btn btn-sm btn-outline-primary">View All Profile History</a>
                        @endif
                    </div>
                </div>
            @endif

            @if($employee->auditRecords->count())
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="fas fa-file-audit"></i> Audit Records ({{ $employee->auditRecords->count() }})
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Validated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee->auditRecords->take(5) as $audit)
                                        <tr>
                                            <td>{{ $audit->action_date->format('M d, Y H:i') }}</td>
                                            <td>{{ Str::limit($audit->action_description, 50) }}</td>
                                            <td>
                                                <span class="badge {{ $audit->validated ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $audit->validated ? 'Yes' : 'No' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($employee->auditRecords->count() > 5)
                            <a href="#" class="btn btn-sm btn-outline-primary">View All Audit Records</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
