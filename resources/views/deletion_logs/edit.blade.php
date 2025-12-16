@extends('layouts.app')

@section('title', 'Edit Deletion Log')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-edit"></i> Edit Deletion Log</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('deletion-logs.index') }}">Deletion Logs</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-form"></i> Deletion Log Information
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

                    <form action="{{ route('deletion-logs.update', $deletionLog->deletion_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="employee_id" class="form-label">Employee <span class="text-danger">*</span></label>
                            <select class="form-select @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" required>
                                <option value="">Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}" {{ old('employee_id', $deletionLog->employee_id) == $employee->employee_id ? 'selected' : '' }}>
                                        {{ $employee->name }} - {{ $employee->employee_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dependency" class="form-label">Dependency Information</label>
                            <textarea class="form-control @error('dependency') is-invalid @enderror" 
                                      id="dependency" name="dependency" rows="4">{{ old('dependency', $deletionLog->dependency) }}</textarea>
                            @error('dependency')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="verified" name="verified" 
                                       value="1" {{ old('verified', $deletionLog->verified) ? 'checked' : '' }}>
                                <label class="form-check-label" for="verified">
                                    Mark as Verified
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="validated_by" class="form-label">Validated By</label>
                            <select class="form-select @error('validated_by') is-invalid @enderror" id="validated_by" name="validated_by">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->user_id }}" {{ old('validated_by', $deletionLog->validated_by) == $user->user_id ? 'selected' : '' }}>
                                        {{ $user->user_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('validated_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Log
                            </button>
                            <a href="{{ route('deletion-logs.index') }}" class="btn btn-secondary">
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
