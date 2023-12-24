<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conduits', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('about', 500);
            $table->string('detail', 2000);
            $table->string('tag', 30);
            $table->foreignId('user_id')->nullable()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('conduits');
    }
};
