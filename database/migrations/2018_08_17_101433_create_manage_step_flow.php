<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageStepFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->default(0);
            $table->string('process_hot_work_id' , 20);
            $table->integer('license_hot_work')->default(0);
            $table->integer('updated_by')->default(0)->nullable(); //license_hot_work
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
        Schema::dropIfExists('manage_steps');
    }
}
