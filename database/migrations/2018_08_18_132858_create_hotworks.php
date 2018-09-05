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
            $table->text('audit_description')->nullable();
            $table->text('safety_tool_description')->nullable();
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0)->nullable();
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
        Schema::dropIfExists('hot_works');
    }
}
