<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->text('work_description')->nullable();
            $table->json('tool')->nullable();
            $table->json('audit')->nullable();
            $table->json('safety')->nullable();
            $table->string('owner_name_end', 255)->nullable();
            $table->string('contractor_name', 255)->nullable();
            $table->integer('engineer_id')->nullable();
            $table->string('engineer_name_end', 255)->nullable();
            $table->string('noc_name_start', 255)->nullable();
            $table->string('noc_name_end', 255)->nullable();
            $table->string('contractor_name_end', 255)->nullable();
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0)->nullable();
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
        Schema::dropIfExists('hot_works');
    }
}
