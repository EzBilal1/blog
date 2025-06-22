<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title', 100)->index();
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->json('tags')->nullable();
            $table->string('category')->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('focus_keyword')->nullable();
            $table->boolean('allow_comments')->default(true);
            $table->boolean('featured')->default(false);
            $table->boolean('email_notify')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'title']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
