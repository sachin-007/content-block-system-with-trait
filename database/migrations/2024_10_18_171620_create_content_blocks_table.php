<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // text, image, etc.
            $table->text('content'); // Text or image URL
            $table->morphs('blockable'); // Polymorphic relationship (blockable_type, blockable_id)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('content_blocks');
    }
}
