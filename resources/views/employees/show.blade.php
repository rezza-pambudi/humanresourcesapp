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
                <h3>Employees</h3>
                <p class="text-subtitle text-muted">Handle employee data or profile.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Employee</li>
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
                    <label for="" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="{{ $employee->fullname }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $employee->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number" value="{{ $employee->phone_number }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea class="form-control" name="address" readonly>{{ $employee->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Hire Date</label>
                    <input type="date" class="form-control date" name="hire_date" value="{{ \Carbon\Carbon::parse($employee->hire_date)->format('Y-m-d') }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Department</label>
                    <input type="text" class="form-control" name="department" value="{{ $employee->department->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <input type="text" class="form-control" name="role" value="{{ $employee->role->title }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <div class="mb-3">
                        @if($employee->status == 'active')
                        <span class="badge bg-success">{{ ucfirst($employee->status) }}</span>
                        @else
                        <span class="badge bg-danger">{{ ucfirst($employee->status) }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Salary</label>
                    <input type="text" class="form-control" name="salary" value="{{ number_format($employee->salary, 2) }}" readonly>
                </div>  

                <div class="d-flex mx-3">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3 ms-auto">
                        <i class="bi bi-arrow-left"></i> Back to List Employee
                    </a>
                </div>

            </div>
        </div>

    </section>
</div>

@endsection