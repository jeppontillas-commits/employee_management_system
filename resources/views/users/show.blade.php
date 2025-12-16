@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-user"></i> User Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">{{ $user->user_name }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> User Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">User ID</h6>
                            <p class="h5"><strong>#{{ $user->user_id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Username</h6>
                            <p class="h5"><strong>{{ $user->user_name }}</strong></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Contact Number</h6>
                            <p>{{ $user->contact_no ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status</h6>
                            <p>
                                @if($user->status == 'active')
                                    <span class="badge bg-success badge-status">Active</span>
                                @elseif($user->status == 'inactive')
                                    <span class="badge bg-warning badge-status">Inactive</span>
                                @else
                                    <span class="badge bg-danger badge-status">Suspended</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created Date</h6>
                            <p>{{ $user->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-2">Address</h6>
                            <p>{{ $user->address ?? 'Not provided' }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p>{{ $user->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->employees->count())
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> Associated Employees ({{ $user->employees->count() }})
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->employees as $employee)
                                        <tr>
                                            <td><a href="{{ route('employees.show', $employee->employee_id) }}">#{{ $employee->employee_id }}</a></td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td>
                                                <span class="badge bg-info badge-status">{{ ucfirst($employee->status) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
