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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->smallInteger('category_id');
            $table->smallInteger('sub_category_id');
            $table->smallInteger('sub_sub_category_id');
            $table->text('tags');
            $table->text('image');
            $table->tinyInteger('status')->default(0);
            $table->text('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
