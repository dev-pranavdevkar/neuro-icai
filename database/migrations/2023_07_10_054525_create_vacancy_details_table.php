<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_details', function (Blueprint $table) {
            $table->id();
            $table->string('ca_firm_name')->nullable();
            $table->enum('position', ['Semi Qualified', 'Article Assistant','Industrial Trainee','Qualified'])->nullable();
            $table->text('comments')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_contact_no')->nullable();
            $table->double('experience')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('location_details');
            $table->unsignedBigInteger('created_by_vacancy_user_id')->nullable();
            $table->foreign('created_by_vacancy_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vacancy_details');
    }
}
