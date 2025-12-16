@extends('layouts.app')

@section('title', 'Edit Profile History')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-edit"></i> Edit Profile History</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employee-profile-histories.index') }}">Profile History</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-form"></i> History Information
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-custom">
                            <i class="fas fa-exclamation-circle"></i> <strong>Validation Errors:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('employee-profile-histories.update', $employeeProfileHistory->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="employee_id" class="form-label">Employee <span class="text-danger">*</span></label>
                            <select class="form-select @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" required>
                                <option value="">Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}" {{ old('employee_id', $employeeProfileHistory->employee_id) == $employee->employee_id ? 'selected' : '' }}>
                                        {{ $employee->name }} - {{ $employee->employee_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $employeeProfileHistory->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $employeeProfileHistory->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_no" class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('contact_no') is-invalid @enderror" 
                                   id="contact_no" name="contact_no" value="{{ old('contact_no', $employeeProfileHistory->contact_no) }}" required>
                            @error('contact_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="changed_date" class="form-label">Changed Date <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control @error('changed_date') is-invalid @enderror" 
                                   id="changed_date" name="changed_date" value="{{ old('changed_date', $employeeProfileHistory->changed_date->format('Y-m-d\TH:i')) }}" required>
                            @error('changed_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="history_data" class="form-label">History Data</label>
                            <textarea class="form-control @error('history_data') is-invalid @enderror" 
                                      id="history_data" name="history_data" rows="4">{{ old('history_data', $employeeProfileHistory->history_data) }}</textarea>
                            @error('history_data')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update History
                            </button>
                            <a href="{{ route('employee-profile-histories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
