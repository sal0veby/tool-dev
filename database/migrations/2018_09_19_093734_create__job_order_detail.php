<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');

            $table->integer('step_2_1');
            $table->string('step_2_1_user', 255);
            $table->string('step_2_1_description', 255)->nullable();

            $table->string('step_2_2_user', 255)->nullable();
            $table->string('step_2_2_tel', 255)->nullable();

            $table->string('step_2_3_user', 255)->nullable();

            $table->string('step_3_1_user', 255)->nullable();

            $table->time('step_3_2_start_work_time')->nullable();
            $table->time('step_3_2_count_people')->nullable();
            $table->string('step_3_2_user', 255)->nullable();

            $table->string('step_5_1_user', 255)->nullable();

            $table->time('step_5_2_end_work_time')->nullable();
            $table->time('step_5_2_count_people')->nullable();
            $table->string('step_5_2_user', 255)->nullable();

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
        Schema::dropIfExists('job_order_details');
    }
}
