@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold text-red-600">Welcome, Admin</h2>
    <p>Total Employees: {{ \App\Models\Employee::count() }}</p>
    <p>Secret Santa Assignments: {{ \App\Models\Assignment::where('year', now()->year)->count() }}</p>
</div>
@endsection
