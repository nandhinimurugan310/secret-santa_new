<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PreviousYearAssignmentController;

Route::resource('previous_assignments', PreviousYearAssignmentController::class);

require __DIR__.'/auth.php'; // Ensure Breeze authentication routes are included

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('/employees/delete-all', [EmployeeController::class, 'deleteAll'])->name('employees.deleteAll');
    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
Route::get('/assignments/export', [AssignmentController::class, 'export'])->name('assignments.export');
Route::delete('/assignments/delete-all', [AssignmentController::class, 'deleteAll'])->name('assignments.deleteAll');
    Route::get('/previous-assignments', [PreviousYearAssignmentController::class, 'index'])->name('previous_assignments.index');
Route::post('/previous-assignments', [PreviousYearAssignmentController::class, 'store'])->name('previous_assignments.store');
    Route::post('/logout', function () { Auth::logout(); return redirect('/login'); })->name('logout');
});
Route::get('/', function () {
    return redirect()->route('login');
});
