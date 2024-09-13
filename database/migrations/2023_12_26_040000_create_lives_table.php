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
        Schema::create('lives', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->boolean('is_live')->default(false);
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
        Schema::dropIfExists('lives');
    }
};
