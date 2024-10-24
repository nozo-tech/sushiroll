<?php

use App\Models\Community;
use App\Models\User;
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
        Schema::create('threads', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->text('text');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->boolean('is_locked')->default(false);
            $table->enum('visibility', ['public', 'unlisted', 'supporters-only', 'private']);
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Community::class)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
