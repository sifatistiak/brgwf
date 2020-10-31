<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingMemberMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_member_maps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained('trainings');
            $table->tinyInteger('is_for_non_member')->default(0)->comment('0 - Not For NON Member . . Only for Members');
            $table->foreignId('union_id')->nullable()->constrained('unions');
            $table->foreignId('factory_id')->nullable()->constrained('factories');
            $table->string('member_name');
            $table->date('training_date');
            $table->foreignId('trainer_id')->constrained('trainers');
            $table->string('organized_by')->nullable();
            $table->string('center_name')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('training_member_maps');
    }
}
