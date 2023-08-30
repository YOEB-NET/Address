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
        Schema::create('yoeb_countries', function (Blueprint $table) {
            $table->id();
            $table->char("name", 100);
            $table->char("iso3", 3);
            $table->char("numeric_code", 3);
            $table->char("iso2", 2);
            $table->string("phonecode");
            $table->string("capital");
            $table->string("currency");
            $table->string("currency_name");
            $table->string("currency_symbol");
            $table->string("tld");
            $table->string("native");
            $table->string("region");
            $table->string("subregion");
            $table->string("nationality");
            $table->longText("timezones");
            $table->double("latitude");
            $table->double("longitude");
            $table->longText("emoji")->nullable();
            $table->longText("emojiU")->nullable();
            $table->tinyInteger("flag")->nullable();
            $table->longText("wikiDataId")->comment("Rapid API GeoDB Cities")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

