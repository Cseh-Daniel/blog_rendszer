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
        Schema::create('label_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")->references("id")->on("posts")->onDelete('cascade');
            $table->foreignId("label_id")->references("id")->on("labels")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('label_posts');
    }
};
