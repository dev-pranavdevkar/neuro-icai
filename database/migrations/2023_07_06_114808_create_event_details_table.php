<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->id();
          $table->string('event_name')->nullable();
            $table->text('event_description')->nullable();
            $table->date('event_start_date')->nullable();
            $table->date('event_end_date')->nullable();
            $table->date('event_cut_off_date')->nullable();
            $table->double('event_fee')->nullable();
            $table->double('price_for_members')->nullable();
            $table->double('price_for_students')->nullable();
            $table->string('event_image')->nullable();
            $table->string('broacher_pdf')->nullable();
            $table->string('event_presentation_video')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('location_details');
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
        Schema::dropIfExists('event_details');
    }
}
