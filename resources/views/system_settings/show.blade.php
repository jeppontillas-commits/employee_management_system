@extends('layouts.app')

@section('title', 'System Setting Details')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-cog"></i> Setting Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('system-settings.index') }}">System Settings</a></li>
                    <li class="breadcrumb-item active">{{ $systemSetting->setting_type }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('system-settings.edit', $systemSetting->setting_id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('system-settings.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Setting Information
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Setting ID</h6>
                            <p class="h5"><strong>#{{ $systemSetting->setting_id }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Setting Type</h6>
                            <p class="h5"><strong>{{ $systemSetting->setting_type }}</strong></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-muted mb-2">Setting Value</h6>
                            <p>{{ $systemSetting->setting_value ?? 'Not set' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Modified By</h6>
                            <p>
                                @if($systemSetting->modifiedByUser)
                                    <a href="{{ route('users.show', $systemSetting->modifiedByUser->user_id) }}">
                                        {{ $systemSetting->modifiedByUser->user_name }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Modified Date</h6>
                            <p>{{ $systemSetting->modified_date->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p>{{ $systemSetting->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p>{{ $systemSetting->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
