<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreviousYearAssignment;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Exception;

class PreviousYearAssignmentController extends Controller
{
    /**
     * Display previous assignments.
     */
    public function index()
    {
        $previousAssignments = PreviousYearAssignment::paginate(10);
        return view('previous_assignments.index', compact('previousAssignments'));
    }

    /**
     * Handle file upload and import data.
     */
    public function store(Request $request)
    {
        // Validate file input
        $request->validate([
            'file' => 'required|mimes:csv,xlsx|max:2048'
        ], [
            'file.mimes' => 'Only CSV and XLSX files are allowed.',
            'file.required' => 'Please upload a file before submitting.',
            'file.max' => 'File size should not exceed 2MB.'
        ]);

        try {
            if (!$request->hasFile('file')) {
                return redirect()->back()->with('error', 'No file was uploaded.');
            }

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

            // **Open CSV File**
            if (!file_exists($filePath)) {
                return redirect()->back()->with('error', 'CSV file could not be processed.');
            }

            $handle = fopen($filePath, 'r');
            if ($handle === false) {
                return redirect()->back()->with('error', 'Failed to open the uploaded file.');
            }

            fgetcsv($handle); // Skip header row

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // **Ensure all required fields are present**
                if (isset($row[0], $row[1], $row[2], $row[3]) &&
                    !empty(trim($row[0])) &&
                    !empty(trim($row[1])) &&
                    !empty(trim($row[2])) &&
                    !empty(trim($row[3]))) {
                    
                    PreviousYearAssignment::updateOrCreate(
                        ['employee_emailid' => trim($row[1])], // Prevent duplicate emails
                        [
                            'employee_name' => trim($row[0]),
                            'employee_emailid' => trim($row[1]),
                            'secret_child_name' => trim($row[2]),
                            'secret_child_emailid' => trim($row[3])
                        ]
                    );
                    $insertedRows++;
                }
            }

            fclose($handle);

            return redirect()->route('previous_assignments.index')->with('success', "Previous year data uploaded successfully! ($insertedRows records added)");

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'File upload failed: ' . $e->getMessage());
        }
    }
}
