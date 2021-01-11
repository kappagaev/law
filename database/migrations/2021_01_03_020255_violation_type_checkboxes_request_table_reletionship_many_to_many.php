<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViolationTypeCheckboxesRequestTableReletionshipManyToMany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkbox_request', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->integer('violation_type_checkbox_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkbox_request', function (Blueprint $table) {
            //
        });
    }
}
