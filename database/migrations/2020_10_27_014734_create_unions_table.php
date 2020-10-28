<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_person')->nullable();
            $table->string('location')->nullable();
            $table->string('total_member')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('est_year')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('present_address')->nullable();
            $table->tinyInteger('is_active')->default(0)->comment('1 - Active , 0 - InActive');
            $table->tinyInteger('is_cba')->default(0)->comment('1 - Active , 0 - InActive');
            $table->tinyInteger('is_osh')->default(0)->comment('1 - Active , 0 - InActive');
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
        Schema::dropIfExists('unions');
    }
}
