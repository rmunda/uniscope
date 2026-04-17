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
        Schema::table('class_sections', function (Blueprint $table) {

            // Drop existing foreign keys
            $table->dropForeign(['class_id']);
            $table->dropForeign(['section_id']);

            // Re-add with RESTRICT (no cascade)
            $table->foreign('class_id')
                ->references('id')
                ->on('academic_classes')
                ->restrictOnDelete();

            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('class_sections', function (Blueprint $table) {

            $table->dropForeign(['class_id']);
            $table->dropForeign(['section_id']);

            // Restore cascade (rollback)
            $table->foreign('class_id')
                ->references('id')
                ->on('academic_classes')
                ->cascadeOnDelete();

            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->cascadeOnDelete();
        });
    }
};
