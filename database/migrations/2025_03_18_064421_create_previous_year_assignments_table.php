<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('previous_year_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name')->nullable(false);  // Required field
            $table->string('employee_emailid')->unique();  // Must be filled
            $table->string('secret_child_name')->nullable(false);
            $table->string('secret_child_emailid')->nullable(false);
            $table->timestamps();
        });
        
        
        
        
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_year_assignments');
    }
};
