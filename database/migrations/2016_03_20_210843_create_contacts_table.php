<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voornaam',50);
            $table->string('achternaam',75);
            $table->string('afbeelding')->default('profile_pic/default.jpg');
            $table->date('geboortedatum');
            $table->integer('dag');
            $table->boolean('opnemen_kalender');
            $table->integer('relation_id')->unsigned();
            $table->timestamps();

            $table->foreign('relation_id')->references('id')->on('relations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
