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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the post
            $table->string('featured_image'); // Path to the featured image
            $table->unsignedBigInteger('category_id')->nullable(); // Use `nullable()` if the relationship is optional
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->text('content'); // Content of the post
            $table->timestamps(); // Created and updated timestamps
            $table->softDeletes(); // Soft delete feature (optional, for recoverable deletion)
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
