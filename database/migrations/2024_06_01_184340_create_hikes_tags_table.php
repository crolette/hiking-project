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
        Schema::create('hikes_tags', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('hike_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('hike_id')->references('id')->on('hikes')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
