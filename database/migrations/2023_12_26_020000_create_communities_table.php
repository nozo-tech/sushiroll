<?php

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
        Schema::create('communities', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('handle')->unique();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->integer('followers')->default(0);
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
        Schema::dropIfExists('communities');
    }
};
