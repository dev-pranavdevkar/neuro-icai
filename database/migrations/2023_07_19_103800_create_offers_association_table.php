<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_association', function (Blueprint $table) {
            $table->id();
            $table->string('offers')->nullable();
            $table->string('discount')->nullable();
            $table->unsignedBigInteger('association_id')->nullable();
            $table->foreign('association_id')->references('id')->on('association_details');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('offers_association');
    }
}
