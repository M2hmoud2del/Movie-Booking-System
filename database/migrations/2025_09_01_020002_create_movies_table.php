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
        Schema::create('movies', function (Blueprint $table) {
            
            $table->id();
            $table->string('name', 100);
            $table->string('genre', 50)->nullable();
            $table->integer('duration');
            $table->date('release_date');
            $table->decimal('rating', 2, 1)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('poster', 255)->nullable();
            $table->string('director', 100)->nullable();
            $table->text('cast')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
