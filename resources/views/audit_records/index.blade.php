@extends('layouts.app')

@section('title', 'Audit Records')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-file-audit"></i> Audit Records</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Audit Records</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('audit-records.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Record
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-custom">
            <i class="fas fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Audit Records List
        </div>
        <div class="card-body">
            @if($records->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Action</th>
                                <th>Date</th>
                                <th>Validated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td><strong>#{{ $record->audit_id }}</strong></td>
                                    <td>
                                        <a href="{{ route('employees.show', $record->employee->employee_id) }}">
                                            {{ $record->employee->name }}
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($record->action_description, 50) }}</td>
                                    <td>{{ $record->action_date->format('M d, Y H:i') }}</td>
                                    <td>
                                        <span class="badge {{ $record->validated ? 'bg-success' : 'bg-warning' }}">
                                            {{ $record->validated ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('audit-records.show', $record->audit_id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('audit-records.edit', $record->audit_id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('audit-records.destroy', $record->audit_id) }}" method="POST" class="d-inline">
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
                {{ $records->links() }}
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No audit records found.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
