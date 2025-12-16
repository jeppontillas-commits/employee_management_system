@extends('layouts.app')

@section('title', 'Edit Report')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-edit"></i> Edit Report</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-form"></i> Report Information
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

                    <form action="{{ route('reports.update', $report->report_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="report_type" class="form-label">Report Type <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('report_type') is-invalid @enderror" 
                                   id="report_type" name="report_type" value="{{ old('report_type', $report->report_type) }}" required>
                            @error('report_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="action_date" class="form-label">Action Date <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control @error('action_date') is-invalid @enderror" 
                                   id="action_date" name="action_date" value="{{ old('action_date', $report->action_date->format('Y-m-d\TH:i')) }}" required>
                            @error('action_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $report->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="pending" {{ old('status', $report->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="generated" {{ old('status', $report->status) == 'generated' ? 'selected' : '' }}>Generated</option>
                                <option value="sent" {{ old('status', $report->status) == 'sent' ? 'selected' : '' }}>Sent</option>
                                <option value="failed" {{ old('status', $report->status) == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="report_data" class="form-label">Report Data</label>
                            <textarea class="form-control @error('report_data') is-invalid @enderror" 
                                      id="report_data" name="report_data" rows="4">{{ old('report_data', $report->report_data) }}</textarea>
                            @error('report_data')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Report
                            </button>
                            <a href="{{ route('reports.index') }}" class="btn btn-secondary">
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
