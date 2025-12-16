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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->string('report_type');
            $table->timestamp('action_date')->useCurrent();
            $table->timestamp('update')->nullable()->useCurrentOnUpdate();
            $table->string('email')->nullable();
            $table->enum('status', ['pending', 'generated', 'sent', 'failed'])->default('pending');
            $table->text('report_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
