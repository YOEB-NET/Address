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
        Schema::create('yoeb_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('state_id');
            $table->string('state_code');
            $table->string('state_name');
            $table->unsignedBigInteger('country_id');
            $table->string('country_code');
            $table->string('country_name');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('wikidataid')->nullable();
            $table->timestamps();

            $table->foreign("country_id")->references("id")->on("yoeb_countries");
            $table->foreign("state_id")->references("id")->on("yoeb_states");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
