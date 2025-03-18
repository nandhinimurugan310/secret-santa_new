@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-red-600 mb-4">Secret Santa Assignments</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4 border border-green-700 shadow-md">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4 border border-red-700 shadow-md">
            <strong>Error:</strong> {{ session('error') }}
        </div>
    @endif

    <!-- Secret Santa Assignments Table -->
    <div class="overflow-x-auto bg-gray-100 p-4 rounded-md shadow-md">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-left">Employee</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Secret Child</th>
                </tr>
            </thead>
            <tbody>
                @forelse($assignments as $assignment)
                    <tr class="hover:bg-gray-200 transition">
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $assignment->employee->name }} ({{ $assignment->employee->email }})
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $assignment->secretChild->name }} ({{ $assignment->secretChild->email }})
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                            No assignments found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex flex-wrap gap-4">
        @if($assignments->isEmpty())
            <!-- Generate Secret Santa -->
            <form action="{{ route('assignments.store') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Generate Secret Santa
                </button>
            </form>
        @endif

        @if(!$assignments->isEmpty())
            <!-- Export to CSV -->
            <form action="{{ route('assignments.export') }}" method="GET">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                    Export to CSV
                </button>
            </form>

            <!-- Delete All -->
            <form action="{{ route('assignments.deleteAll') }}" method="POST" onsubmit="return confirm('Are you sure? This will delete all assignments!');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                    Delete All Assignments
                </button>
            </form>
        @endif
    </div>
</div>
@endsection