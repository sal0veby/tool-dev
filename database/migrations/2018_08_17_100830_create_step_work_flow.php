<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepWorkFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('process_next_id');
            $table->integer('state_next_id');
            $table->integer('process_before_id');
            $table->integer('state_before_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_flows');
    }
}
