<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleBindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_bindings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namespace');
            $table->string('name');
            $table->string('role_kind');
            $table->string('role_name');
            // $table->timestamps();

            $table->unique(['namespace', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_bindings');
    }
}
