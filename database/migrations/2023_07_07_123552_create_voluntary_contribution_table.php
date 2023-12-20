<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntaryContributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntary_contribution', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable();
            $table->double('price')->nullable();
            $table->string('available_place')->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('voluntary_contribution');
    }
}
