<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_work', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('owner_name', 255);
            $table->string('department', 255);
            $table->text('description');
            $table->json('tools');
            $table->string('audit', 50);
            $table->string('audit_count', 10);
            $table->string('audit_description', 255);
            $table->string('safety', 50);
            $table->string('safety_description', 255);
            $table->string('owner_name_end', 255);
            $table->string('contractor_name', 255);
            $table->integer('engineer_id');
            $table->string('engineer_name_end', 255);
            $table->string('noc_name_start', 255);
            $table->string('noc_name_end', 255);
            $table->string('contractor_name_end', 255);
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
        Schema::dropIfExists('tools');
    }
}
