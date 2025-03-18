@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-red-600 mb-4">Upload Employee List</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="flex items-center bg-green-100 border-l-4 border-green-600 text-green-800 p-4 rounded-lg mb-4 animate-fade-in">
            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="flex items-center bg-red-100 border-l-4 border-red-600 text-red-800 p-4 rounded-lg mb-4 animate-fade-in">
            <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-600 text-red-800 p-4 rounded-lg mb-4 animate-fade-in">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="font-medium">File Upload Failed!</span>
            </div>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Upload Form -->
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <label for="file" class="block text-gray-700 font-semibold mb-2">Choose a CSV or Excel File:</label>
        <input type="file" name="file" id="file" required class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        
        <button type="submit" class="mt-3 bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition duration-300">
            Upload
        </button>
    </form>

    <!-- Employee List -->
    <h2 class="text-xl font-bold text-gray-700 mb-3">Employee List</h2>
    <div class="overflow-x-auto bg-gray-100 p-4 rounded-md">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $employee->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $employee->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                            No employees found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $employees->links() }}
    </div>

    
</div>
@endsection
