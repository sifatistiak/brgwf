<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('union_id')->nullable()->constrained('unions');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->foreignId('factory_category_id')->nullable()->constrained('factory_categories');
            $table->string('email')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('no_of_workers')->nullable();
            $table->string('present_address',255)->nullable();
            $table->string('permanent_address',255)->nullable();
            $table->tinyInteger('is_accord')->default(0)->comment('1 - Active , 0 - InActive');
            $table->tinyInteger('is_alliance')->default(0)->comment('1 - Active , 0 - InActive');
            $table->tinyInteger('is_non_compliance')->default(0)->comment('1 - Active , 0 - InActive');
            $table->tinyInteger('is_nap')->default(0)->comment('1 - Active , 0 - InActive');
            $table->tinyInteger('is_active')->default(0)->comment('1 - Active , 0 - InActive');
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
        Schema::dropIfExists('factories');
    }
}
