<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->text("description");
            $table->string("time_length");
            $table->integer("max_participants");
            $table->integer("max_accomp");
            $table->string("organised_by");
            $table->timestamps();
        });

        Schema::create('event_relations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("event");
            $table->integer("student");
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
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_relations');
    }
}
