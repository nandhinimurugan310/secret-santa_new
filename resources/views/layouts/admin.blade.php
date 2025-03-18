<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Santa Admin</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-red-700 text-white p-5 h-screen">
            <h2 class="text-lg font-bold">Secret Santa</h2>
            <ul class="mt-5">
                <li><a href="{{ route('dashboard') }}" class="block py-2 hover:bg-red-600">Dashboard</a></li>
                <li><a href="{{ route('employees.index') }}" class="block py-2 hover:bg-red-600">Employees</a></li>
                <li><a href="{{ route('assignments.index') }}" class="block py-2 hover:bg-red-600">Assignments</a></li>
                <li><a href="{{ route('previous_assignments.index') }}" class="block py-2 hover:bg-red-600">Previous Year Data</a></li>
                <li><a href="#" onclick="document.getElementById('logout-form').submit();" class="block py-2 hover:bg-red-600">Logout</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </aside>

        <!-- Main Content -->
        <main class="w-4/5 p-5">
            <!-- Navbar -->
            <nav class="flex justify-between bg-white shadow p-4">
                <h1 class="text-xl font-bold text-red-600">Admin Panel</h1>
                <a href="#" onclick="document.getElementById('logout-form').submit();" class="text-red-700">Logout</a>
            </nav>
            
            <div class="mt-5">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
