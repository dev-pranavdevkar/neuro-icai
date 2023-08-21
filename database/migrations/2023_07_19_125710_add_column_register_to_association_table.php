<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRegisterToAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_to_association', function (Blueprint $table) {
            $table->unsignedBigInteger('offers_association_id')->nullable();
            $table->foreign('offers_association_id')->references('id')->on('offers_association');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_to_association', function (Blueprint $table) {
            //
        });
    }
}
