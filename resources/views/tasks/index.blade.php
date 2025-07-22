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
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data
                </h5>
            </div>
            <div class="card-body">

            <div class="d-flex">
                <a href ="{{ route('tasks.create') }}" class="btn btn-primary mb-3 ms-auto">
                    <i class="bi bi-plus"></i> New Task
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Asigned To</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->employee->fullname }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                @if($task->status == 'done')
                                    <span class="text-success">{{ $task->status }}</span>
                                @elseif($task->status == 'pending')
                                    <span class="text-dark">{{ $task->status }}</span>
                                @elseif($task->status == 'on progress')
                                    <span class="text-warning">{{ $task->status }}</span>
                                @else
                                    <span class="text-secondary">{{ $task->status }}</span>
                                @endif
                                
                            </td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-dark btn-sm" >View</a>

                                @if($task->status == 'pending')
                                    <a href="{{ route('tasks.done', $task->id) }}" class="btn btn-success btn-sm" >Done</a>
                                    <a href="{{ route('tasks.onprogress', $task->id) }}" class="btn btn-warning btn-sm" >On Progress</a>
                                @elseif($task->status == 'done')
                                    <a href="{{ route('tasks.pending', $task->id) }}" class="btn btn-light btn-sm" >Pending</a>
                                    <a href="{{ route('tasks.onprogress', $task->id) }}" class="btn btn-warning btn-sm" >On Progress</a>
                                @else($task->status == 'on progress')
                                    <a href="{{ route('tasks.done', $task->id) }}" class="btn btn-success btn-sm" >Done</a>
                                    <a href="{{ route('tasks.pending', $task->id) }}" class="btn btn-light btn-sm" >Pending</a>
                                @endif

                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary btn-sm" >Edit</a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@endsection