<?php

use App\Models\Channel;
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
        Schema::create('rolls', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->boolean('is_locked')->default(false);
            $table->enum('visibility', ['public', 'unlisted', 'supporters-only', 'private']);
            $table->foreignIdFor(Channel::class)->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rolls');
    }
};
