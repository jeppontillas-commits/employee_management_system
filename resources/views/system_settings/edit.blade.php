@extends('layouts.app')

@section('title', 'Edit System Setting')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-edit"></i> Edit System Setting</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('system-settings.index') }}">System Settings</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-form"></i> Setting Information
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

                    <form action="{{ route('system-settings.update', $systemSetting->setting_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="setting_type" class="form-label">Setting Type <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('setting_type') is-invalid @enderror" 
                                   id="setting_type" name="setting_type" value="{{ old('setting_type', $systemSetting->setting_type) }}" required>
                            @error('setting_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="setting_value" class="form-label">Setting Value</label>
                            <textarea class="form-control @error('setting_value') is-invalid @enderror" 
                                      id="setting_value" name="setting_value" rows="4">{{ old('setting_value', $systemSetting->setting_value) }}</textarea>
                            @error('setting_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="modified_by" class="form-label">Modified By</label>
                            <select class="form-select @error('modified_by') is-invalid @enderror" id="modified_by" name="modified_by">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->user_id }}" {{ old('modified_by', $systemSetting->modified_by) == $user->user_id ? 'selected' : '' }}>
                                        {{ $user->user_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('modified_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Setting
                            </button>
                            <a href="{{ route('system-settings.index') }}" class="btn btn-secondary">
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
