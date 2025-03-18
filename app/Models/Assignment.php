<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'secret_child_id',
        'year',
    ];

    /**
     * Get the employee who is the Secret Santa.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Get the employee who is the secret child.
     */
    public function secretChild()
    {
        return $this->belongsTo(Employee::class, 'secret_child_id');
    }
}
