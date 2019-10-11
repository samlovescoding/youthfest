<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200);
            $table->string('father_name', 200);
            $table->date('date_birth', 200);
            $table->string('class', 200);
            $table->string('branch', 200);
            $table->integer('roll_number')->unsigned();
            $table->integer('university_registration')->unsigned();
            $table->integer('year_of_passing')->unsigned();
            $table->text('address');
            $table->enum('participating_as', ['participant', 'student_accomp', 'accomp']);
            $table->integer('accomp_id');
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
        Schema::dropIfExists('students');
    }
}
