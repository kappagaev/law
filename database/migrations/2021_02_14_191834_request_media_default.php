<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestMediaDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->json('photocopy')->nullable()->change();
            $table->json('audio')->nullable()->change();
            $table->json('video')->nullable()->change();
            $table->json('reg_photocopy')->nullable()->change();
            $table->json('witness_reg_photo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
