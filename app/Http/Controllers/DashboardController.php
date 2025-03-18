<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalAssignments = Assignment::where('year', now()->year)->count();

        return view('dashboard', compact('totalEmployees', 'totalAssignments'));
    }
}
