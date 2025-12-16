@extends('layouts.app')

@section('title', 'Edit Audit Record')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-edit"></i> Edit Audit Record</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('audit-records.index') }}">Audit Records</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-form"></i> Audit Record Information
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

                    <form action="{{ route('audit-records.update', $auditRecord->audit_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="employee_id" class="form-label">Employee <span class="text-danger">*</span></label>
                            <select class="form-select @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" required>
                                <option value="">Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}" {{ old('employee_id', $auditRecord->employee_id) == $employee->employee_id ? 'selected' : '' }}>
                                        {{ $employee->name }} - {{ $employee->employee_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="action_date" class="form-label">Action Date <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control @error('action_date') is-invalid @enderror" 
                                   id="action_date" name="action_date" value="{{ old('action_date', $auditRecord->action_date->format('Y-m-d\TH:i')) }}" required>
                            @error('action_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="action_description" class="form-label">Action Description</label>
                            <textarea class="form-control @error('action_description') is-invalid @enderror" 
                                      id="action_description" name="action_description" rows="4">{{ old('action_description', $auditRecord->action_description) }}</textarea>
                            @error('action_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="validated" name="validated" 
                                       value="1" {{ old('validated', $auditRecord->validated) ? 'checked' : '' }}>
                                <label class="form-check-label" for="validated">
                                    Mark as Validated
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Record
                            </button>
                            <a href="{{ route('audit-records.index') }}" class="btn btn-secondary">
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
