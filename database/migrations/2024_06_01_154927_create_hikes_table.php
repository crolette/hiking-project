<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hikes', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 255)->unique();
            $table->string('location', length: 255);
            $table->boolean('round_trip');
            $table->string('description', length: 1000)->nullable();
            $table->decimal('distance', total:5, places:2)->unsigned();
            $table->smallInteger('elevation_gain');
            $table->time("duration", precision:0);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign("user_id")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hikes');
    }
};
