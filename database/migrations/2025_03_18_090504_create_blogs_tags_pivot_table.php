<?php

use App\Models\BlogTags;
use App\Models\Blog;
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
        Schema::create('blogs_tags_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Blog::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(BlogTags::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_tags_pivot');
    }
};
