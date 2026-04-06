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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            // Foreign key column
            // $table->foreignId('class_id')
            //     ->constrained('academic_classes')
            //     ->onDelete('cascade');

            // Just a column, no FK constraint
            $table->unsignedBigInteger('class_id')->nullable();
            $table->string('section_name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
