<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('organization')->nullable();
            $table->string('name')->nullable();
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->foreignId('designation_id')->nullable()->constrained('designations');
            $table->foreignId('course_id')->nullable()->constrained('trainings');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('nid')->nullable();
            $table->string('present_address')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}
