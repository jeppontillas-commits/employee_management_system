@extends('layouts.app')

@section('title', 'System Settings')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-cog"></i> System Settings</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">System Settings</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('system-settings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Setting
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-custom">
            <i class="fas fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Settings List
        </div>
        <div class="card-body">
            @if($settings->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Setting Type</th>
                                <th>Value</th>
                                <th>Modified By</th>
                                <th>Modified Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td><strong>#{{ $setting->setting_id }}</strong></td>
                                    <td>{{ $setting->setting_type }}</td>
                                    <td>{{ Str::limit($setting->setting_value, 50) ?? 'N/A' }}</td>
                                    <td>
                                        @if($setting->modifiedByUser)
                                            <a href="{{ route('users.show', $setting->modifiedByUser->user_id) }}">
                                                {{ $setting->modifiedByUser->user_name }}
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $setting->modified_date->format('M d, Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('system-settings.show', $setting->setting_id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('system-settings.edit', $setting->setting_id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('system-settings.destroy', $setting->setting_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $settings->links() }}
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No system settings found. <a href="{{ route('system-settings.create') }}">Create one now</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
