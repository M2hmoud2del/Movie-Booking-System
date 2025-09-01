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
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('log_id', 20)->unique(); // make it unique, not primary
            $table->foreignId('admin_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('action', 50)->nullable();
            $table->string('module', 50)->nullable();
            $table->dateTime('action_datetime')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_logs');
    }
};
