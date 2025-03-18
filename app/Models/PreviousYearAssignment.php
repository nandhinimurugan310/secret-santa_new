<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousYearAssignment extends Model
{
    protected $fillable = [
        'employee_name', 
        'employee_emailid', 
        'secret_child_name', 
        'secret_child_emailid'
    ];

    /**
     * Relationship: An employee is assigned to a secret child.
     */
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_emailid', 'email');
    }

    /**
     * Relationship: A secret child is also a user.
     */
    public function secretChild()
    {
        return $this->belongsTo(User::class, 'secret_child_emailid', 'email');
    }
}
