<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('description');
            $table->string('slug')->unique();
            $table->integer('academic_year_id')->unsigned();
            $table->enum('semester_applicable', ['1st SEMESTER', '2nd SEMESTER']);
            $table->integer('course_id')->unsigned();
            $table->decimal('units', 3, 2);
            $table->decimal('price_per_unit', 19, 4);
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
        Schema::dropIfExists('subjects');
    }
}
