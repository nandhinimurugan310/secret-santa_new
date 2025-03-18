<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response; 

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Assignment;
use App\Models\PreviousYearAssignment;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with('employee', 'secretChild')->where('year', now()->year)->get();
        return view('assignments.index', compact('assignments'));
    }

    public function store()
    {
        $employees = Employee::all()->shuffle();
        $previousAssignments = PreviousYearAssignment::all()->pluck('secret_child_id', 'employee_id')->toArray();

        $assignments = [];

        foreach ($employees as $giver) {
            $possibleReceivers = $employees->reject(fn ($e) => $e->id == $giver->id || (isset($previousAssignments[$giver->id]) && $previousAssignments[$giver->id] == $e->id));

            if ($possibleReceivers->isEmpty()) {
                return redirect()->back()->with('error', 'Secret Santa assignment failed due to constraints. Try again.');
            }

            $receiver = $possibleReceivers->random();
            $assignments[] = [
                'employee_id' => $giver->id,
                'secret_child_id' => $receiver->id,
                'year' => now()->year
            ];
            $employees = $employees->reject(fn ($e) => $e->id == $receiver->id);
        }

        Assignment::insert($assignments);

        return redirect()->route('assignments.index')->with('success', 'Secret Santa assigned successfully!');
    }
    public function export()
{
    $assignments = Assignment::with(['employee', 'secretChild'])->get();
    
    $csvFileName = 'secret_santa_assignments.csv';
    $headers = [
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$csvFileName",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    ];

    $callback = function () use ($assignments) {
        $file = fopen('php://output', 'w');
        fputcsv($file, ['Employee Name', 'Employee Email', 'Secret Child Name', 'Secret Child Email']);

        foreach ($assignments as $assignment) {
            fputcsv($file, [
                $assignment->employee->name,
                $assignment->employee->email,
                $assignment->secretChild->name,
                $assignment->secretChild->email
            ]);
        }
        fclose($file);
    };

    return Response::stream($callback, 200, $headers);
}
public function deleteAll()
{
    Assignment::truncate();
    return redirect()->route('assignments.index')->with('success', 'All assignments deleted successfully!');
}

}

