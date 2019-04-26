<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleBindingSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_binding_subjects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('role_binding_id');
            $table->string('subject_kind');
            $table->bigInteger('subject_id');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_binding_subjects');
    }
}
