<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('getways', function (Blueprint $table) {
            $table->increments('id', 100);
            $table->string('name')->nullable();
            $table->string('gateimg')->nullable();
            $table->string('fix_charge')->nullable();
            $table->string('percent_charge')->nullable();
            $table->string('rate')->nullable();
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('val3')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('getways');
    }
}
