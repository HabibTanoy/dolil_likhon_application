<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDolilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dolils', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('daag_number')->nullable();
            $table->string('mouja')->nullable();
            $table->string('khotian')->nullable();
            $table->string('buyer')->nullable();
            $table->string('seller')->nullable();
            $table->string('google_link')->nullable();
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
        Schema::dropIfExists('dolils');
    }
}
