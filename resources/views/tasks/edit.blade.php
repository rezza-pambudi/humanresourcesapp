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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Edit Task
                </h5>
            </div>
            <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $task->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Employee</label>
                    <select name="assigned_to" class="form-select @error('assigned_to') is-invalid @enderror" required>
                        <option value="">Select an Employee</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" @if(old('assigned_to', $task->assigned_to) == $employee->id) selected @endif>{{ $employee->fullname }}</option>
                        @endforeach
                    </select>
                    @error('assigned_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Due Date</label>
                    <input type="date" class="form-control date @error('due_date') is-invalid @enderror" value="{{ @old('due_date', $task->due_date) }}" name="due_date" required>
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="pending" @if(old('status', $task->status) == 'pending') selected @endif>Pending</option>
                        <option value="on progress" @if(old('status', $task->status) == 'on progress') selected @endif>On Progress</option>
                    </select>
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
            </form>
             
            </div>
        </div>

    </section>
</div>

@endsection