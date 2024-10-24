<?php

use App\Models\User;
use App\Models\Group;
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
        Schema::create('channels', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('handle')->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->integer('followers')->default(0);
            $table->string('livestream_key')->unique()->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamp('banned_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
