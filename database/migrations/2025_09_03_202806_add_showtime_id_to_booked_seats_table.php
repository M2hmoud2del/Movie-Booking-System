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
        Schema::table('booked_seats', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('showtime_id')->nullable()->after('booking_id');

            // Add foreign key reference
            $table->foreign('showtime_id')
                ->references('id')
                ->on('showtimes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booked_seats', function (Blueprint $table) {
            //
            $table->dropForeign(['showtime_id']);
            $table->dropColumn('showtime_id');
        });
    }
};
