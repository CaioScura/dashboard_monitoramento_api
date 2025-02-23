<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('api_monitors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('url')->unique();
        $table->boolean('is_active')->default(true);
        $table->integer('response_time')->nullable();
        $table->timestamp('last_checked')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_monitors');
    }
};
