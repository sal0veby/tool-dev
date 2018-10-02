<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreatePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('menu_id')->nullable();
            $table->text('description')->nullable();
            $table->boolean('use')->nullable();
            $table->boolean('add')->nullable();
            $table->boolean('update')->nullable();
            $table->boolean('delete')->nullable();
            $table->boolean('excel')->nullable();
            $table->boolean('pdf')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('default')->default(0);
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0)->nullable();
            NestedSet::columns($table);
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
        Schema::dropIfExists('permissions');
    }
}
