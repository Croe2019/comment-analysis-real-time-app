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
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->string('video_id')->unique(); // YouTubeのvideoId
            $table->string('live_chat_id')->nullable(); // LiveChatID（後から取得）
            $table->string('title')->nullable();

            $table->enum('status', ['waiting', 'live', 'ended'])->default('waiting');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streams');
    }
};
