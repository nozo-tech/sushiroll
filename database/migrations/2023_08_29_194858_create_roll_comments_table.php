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
            $table->ulidMorphs('roll_commentable');
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
