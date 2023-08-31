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
        Schema::create('roll_comments', function (Blueprint $table) {
            $table->ulid('id')->unique()->primary();
            $table->string('title')->nullable();
            $table->longText('description');
            $table->foreignUlid('roll_id')->nullable();
            $table->foreignUlid('roll_comment_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roll_comments');
    }
};
