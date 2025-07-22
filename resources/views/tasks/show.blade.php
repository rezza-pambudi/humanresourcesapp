@extends('layouts.dashboard')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tasks</h3>
                <p class="text-subtitle text-muted">Handle employee tasks.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Task</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Detail
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $task->title }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="assigned_to" class="form-label">Assigned To</label>
                    <input type="text" class="form-control" name="assigned_to" value="{{ $task->employee->fullname }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" name="due_date" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <div class="mb-3">
                        @if($task->status == 'pending')
                        <span class="badge bg-warning">{{ ucfirst($task->status) }}</span>
                    @elseif($task->status == 'done')
                        <span class="badge bg-success">{{ ucfirst($task->status) }}</span>
                    @elseif($task->status == 'on progress')
                        <span class="badge bg-info">{{ ucfirst($task->status) }}</span>
                    @else
                        <span class="badge bg-secondary">Unknown</span>
                    @endif
                    </div>
                    
                </div>
                <div class="mb-3"></div>
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" readonly>{{ $task->description }}</textarea>
                </div>

                <div class="d-flex mx-3">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3 ms-auto">
                        <i class="bi bi-arrow-left"></i> Back to Tasks
                    </a>
                </div>

            </div>
        </div>

    </section>
</div>

@endsection