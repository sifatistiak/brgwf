<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factory_id')->nullable()->constrained('factories');
            $table->string('membership_no')->unique()->nullable();
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->foreignId('religion_id')->nullable()->constrained('religions');
            $table->string('photo')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('mobile')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('nid')->nullable();
            $table->foreignId('designation_id')->nullable()->constrained('designations');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->date('joining_date')->nullable();
            $table->tinyInteger('is_paid')->default(0);
            $table->string('present_address', 255)->nullable();
            $table->string('permanent_address', 255)->nullable();
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
        Schema::dropIfExists('non_members');
    }
}
