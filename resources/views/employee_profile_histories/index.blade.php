@extends('layouts.app')

@section('title', 'Employee Profile Histories')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-history"></i> Profile History Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile History</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('employee-profile-histories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add History
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-custom">
            <i class="fas fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Profile History List
        </div>
        <div class="card-body">
            @if($histories->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Changed Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td><strong>#{{ $history->id }}</strong></td>
                                    <td>
                                        <a href="{{ route('employees.show', $history->employee->employee_id) }}">
                                            {{ $history->employee->name }}
                                        </a>
                                    </td>
                                    <td>{{ $history->name }}</td>
                                    <td>{{ $history->email }}</td>
                                    <td>{{ $history->changed_date->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('employee-profile-histories.show', $history->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('employee-profile-histories.edit', $history->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('employee-profile-histories.destroy', $history->id) }}" method="POST" class="d-inline">
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
                {{ $histories->links() }}
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No profile histories found.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
