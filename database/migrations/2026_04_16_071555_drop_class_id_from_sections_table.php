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
        Schema::table('sections', function (Blueprint $table) {
            // If foregin key constraint
            // $table->dropForeign(['class_id']);
            // $table->dropColumn('class_id');

            $table->dropColumn('class_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            // Step 1: Re-create column
            $table->unsignedBigInteger('class_id')->nullable();

            // Step 2: Re-add foreign key
            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade'); // or whatever used earlier
            });
    }
};
