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
        Schema::create('campaign_email', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedBiginteger('campaign_id')->unsigned();
            $table->unsignedBiginteger('contact_id')->unsigned();

            $table->foreign('campaign_id')->references('id')->on('campaigns')

                ->onDelete('cascade');

            $table->foreign('contact_id')->references('id')->on('contact')

                ->onDelete('cascade');
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
