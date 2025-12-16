@extends('layouts.app')

@section('title', 'Deletion Logs')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-trash"></i> Deletion Logs Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Deletion Logs</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('deletion-logs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Log
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-custom">
            <i class="fas fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Deletion Logs List
        </div>
        <div class="card-body">
            @if($logs->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Verified</th>
                                <th>Validated By</th>
                                <th>Timestamp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td><strong>#{{ $log->deletion_id }}</strong></td>
                                    <td>
                                        <a href="{{ route('employees.show', $log->employee->employee_id) }}">
                                            {{ $log->employee->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge {{ $log->verified ? 'bg-success' : 'bg-warning' }}">
                                            {{ $log->verified ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($log->validatedByUser)
                                            <a href="{{ route('users.show', $log->validatedByUser->user_id) }}">
                                                {{ $log->validatedByUser->user_name }}
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $log->timestamp->format('M d, Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('deletion-logs.show', $log->deletion_id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('deletion-logs.edit', $log->deletion_id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('deletion-logs.destroy', $log->deletion_id) }}" method="POST" class="d-inline">
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
                {{ $logs->links() }}
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No deletion logs found.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
