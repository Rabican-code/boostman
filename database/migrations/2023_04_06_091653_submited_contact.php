<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Campaign_item;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submited_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->text('contact')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
