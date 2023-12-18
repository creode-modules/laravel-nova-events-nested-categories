<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('venue');
            $table->mediumText('address');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('new_event_categories')->onDelete('cascade');
            $table->string('cta_link');
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
        Schema::dropIfExists('new_events');
    }
};
