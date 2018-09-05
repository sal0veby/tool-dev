<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('menu_id')->nullable();
            $table->boolean('use')->nullable();
            $table->boolean('add')->nullable();
            $table->boolean('update')->nullable();
            $table->boolean('delete')->nullable();
            $table->boolean('excel')->nullable();
            $table->boolean('pdf')->nullable();
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('user_permissions');
    }
}
