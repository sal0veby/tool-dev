<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_no', 50);
            $table->string('reference_no', 150)->nullable();
            $table->dateTime('coming_work_date');
            $table->integer('class_id');
            $table->time('start_work_time');
            $table->time('end_work_time');
            $table->text('requirement');
            $table->integer('work_type_id');
            $table->text('description_work_type')->nullable();
            $table->integer('location_id');
            $table->text('description_location')->nullable();
            $table->integer('process_id');
            $table->integer('state_id');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_orders');
    }
}
