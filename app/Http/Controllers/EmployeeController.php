<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EmployeeController extends Controller
{
    /**
     * Display the employee list.
     */
    public function index()
{
    $employees = Employee::paginate(5); // Show 10 employees per page
    return view('employees.index', compact('employees'));
}

public function deleteAll()
{
    Employee::truncate(); // Delete all records
    return redirect()->route('employees.index')->with('success', 'All employees deleted successfully!');
}

    /**
     * Handle employee file upload and import.
     */

     public function store(Request $request)
    {
        // **Validate the file before processing**
        $request->validate([
            'file' => 'required|mimes:csv,xlsx|max:2048'
        ], [
            'file.mimes' => 'Only CSV and XLSX files are allowed.',
            'file.required' => 'Please upload a file before submitting.',
            'file.max' => 'File size should not exceed 2MB.'
        ]);

        try {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->getRealPath();
            $insertedRows = 0;

            // **Convert XLSX to CSV if needed**
            if ($extension === 'xlsx') {
                $spreadsheet = IOFactory::load($filePath);
                $csvFilePath = sys_get_temp_dir() . '/' . time() . '.csv';

                $writer = IOFactory::createWriter($spreadsheet, 'Csv');
                $writer->save($csvFilePath);

                // **Set file path to the converted CSV file**
                $filePath = $csvFilePath;
            }

            // **Open and process CSV File**
            $handle = fopen($filePath, 'r');

            if ($handle === false) {
                return redirect()->back()->with('error', 'Failed to open the uploaded file.');
            }

            fgetcsv($handle); // Skip header row

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (!empty($row[0]) && !empty($row[1])) {
                    Employee::updateOrCreate(
                        ['email' => trim($row[1])], // Avoid duplicate emails
                        ['name' => trim($row[0]), 'email' => trim($row[1])]
                    );
                    $insertedRows++;
                }
            }

            fclose($handle);

            return redirect()->route('employees.index')->with('success', "Employees uploaded successfully! ($insertedRows records added)");

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'File upload failed: ' . $e->getMessage());
        }
    }
    /**
     * Show employee details.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing an employee.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update employee details.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    /**
     * Delete an employee.
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
