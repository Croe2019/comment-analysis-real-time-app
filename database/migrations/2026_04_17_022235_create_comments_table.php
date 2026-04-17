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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stream_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('youtube_comment_id')->unique();

            $table->string('user_name');
            $table->text('message');

            // 分析系
            $table->float('score')->nullable(); // スコア（NG度・スパム度など）
            $table->enum('sentiment', ['positive', 'neutral', 'negative'])->nullable();

            $table->enum('type', ['normal', 'danger', 'spam'])->default('normal');

            // YouTubeの投稿時間
            $table->timestamp('posted_at')->index();
            $table->timestamps();
            // 高速化インデックス
            $table->index(['stream_id', 'posted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
