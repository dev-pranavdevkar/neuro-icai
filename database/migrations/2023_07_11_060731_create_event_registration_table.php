<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('event_details');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('payment_mode_id')->nullable();
            $table->foreign('payment_mode_id')->references('id')->on('payment_mode');
            $table->unsignedBigInteger('voluntary_contribution_id')->nullable();
            $table->foreign('voluntary_contribution_id')->references('id')->on('voluntary_contribution');
            $table->enum('payment_status', ['paid', 'unpaid'])->nullable();
            $table->integer('gst_no')->nullable();
            $table->string('legal_name')->nullable();
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
        Schema::dropIfExists('event_registration');
    }
}
