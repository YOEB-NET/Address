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
        Schema::create('yoeb_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('type')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string("neighbourhood")->nullable();
            $table->string("building_no")->nullable();
            $table->string("floor")->nullable();
            $table->string("apartment")->nullable();
            $table->string("detail")->nullable();
            $table->string("directions")->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("country_id")->references("id")->on("yoeb_countries");
            $table->foreign("state_id")->references("id")->on("yoeb_states");
            $table->foreign("city_id")->references("id")->on("yoeb_cities");
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
