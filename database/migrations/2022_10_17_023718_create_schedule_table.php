<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id('s_id');
            $table->string('type');
            $table->string('title')->nullable();
            $table->date('current_date')->nullable();
            $table->datetime('end');
            $table->datetime('start');
            $table->date('date_from');
            $table->date('date_to');
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->string('req_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('barangay')->nullable();
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
        Schema::dropIfExists('schedule');
    }
}
