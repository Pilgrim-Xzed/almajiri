<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadingSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heading_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('cause')->nullable();
            $table->longText('volunteer')->nullable();
            $table->longText('be_volunteer')->nullable();
            $table->longText('who_talk')->nullable();
            $table->longText('event')->nullable();
            $table->longText('blog')->nullable();
            $table->longText('sponsor')->nullable();
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
        Schema::dropIfExists('heading_sections');
    }
}
