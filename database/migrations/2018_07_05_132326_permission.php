<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class Permission extends Migration
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
            $table->string('name');
            $table->string('parent');
            $table->text('description');
            $table->boolean('use')->nullable();
            $table->boolean('add')->nullable();
            $table->boolean('update')->nullable();
            $table->boolean('delete')->nullable();
            $table->boolean('excel')->nullable();
            $table->boolean('pdf')->nullable();
            $table->boolean('active');
            $table->integer('created_by');
            $table->integer('updated_by');
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
