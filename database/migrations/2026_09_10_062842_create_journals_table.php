<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedSmallInteger('year');
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('pdf_path');
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_published', 'year']);
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};