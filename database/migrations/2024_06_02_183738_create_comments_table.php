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
            //unsignedBigInteger stores only positive and zero
            $table->id(); //comment id
            $table->unsignedBigInteger('user_id'); //the one who comments
            $table->unsignedBigInteger('post_id'); //comment on post
            $table->unsignedBigInteger('parent_id')->nullable(); //this is for replies
            $table->text('body'); //comment body
            $table->text('status')->default('not_approved'); //comment will be first approved by the admin or superadmin
            $table->timestamps();
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
