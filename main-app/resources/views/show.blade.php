@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-body">
        <p style="font-size:20px; font-weight:bold;">Employee details</p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$employee->name}}" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="{{$employee->email}}" readonly>
        </div>

        <div class="form-group">
            <label for="joining_date">Joining date</label>
            <input type="date" class="form-control" value="{{$employee->Joining_date}}" readonly>
        </div>

        <div class="form-group">
            <label for="joining_salary">Joining salary</label>
            <input type="number" class="form-control" value="{{$employee->salary}}" readonly>
        </div>

        <div class="form-group">
            <label for="is_active">Active</label><br>
            <input type="checkbox" checked readonly />
        </div>
        <a href="/employees" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection