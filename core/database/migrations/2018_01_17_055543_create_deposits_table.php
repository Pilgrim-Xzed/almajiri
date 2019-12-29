<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gateway_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('unique_key')->nullable();
            $table->string('bcid')->nullable();
            $table->string('bcam')->default(0);
            $table->string('try')->default(0);
            $table->string('prove')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('deposits');
    }
}
