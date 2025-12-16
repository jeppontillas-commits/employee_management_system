@extends('layouts.app')

@section('title', 'Reports')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0"><i class="fas fa-chart-bar"></i> Reports Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('reports.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Report
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-custom">
            <i class="fas fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-list"></i> Reports List
        </div>
        <div class="card-body">
            @if($reports->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Report Type</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td><strong>#{{ $report->report_id }}</strong></td>
                                    <td>{{ $report->report_type }}</td>
                                    <td>{{ $report->email ?? 'N/A' }}</td>
                                    <td>
                                        @if($report->status == 'pending')
                                            <span class="badge bg-warning badge-status">Pending</span>
                                        @elseif($report->status == 'generated')
                                            <span class="badge bg-info badge-status">Generated</span>
                                        @elseif($report->status == 'sent')
                                            <span class="badge bg-success badge-status">Sent</span>
                                        @else
                                            <span class="badge bg-danger badge-status">Failed</span>
                                        @endif
                                    </td>
                                    <td>{{ $report->action_date->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('reports.show', $report->report_id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('reports.edit', $report->report_id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('reports.destroy', $report->report_id) }}" method="POST" class="d-inline">
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
                {{ $reports->links() }}
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No reports found. <a href="{{ route('reports.create') }}">Create one now</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
