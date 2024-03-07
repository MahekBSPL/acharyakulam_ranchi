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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');    
            $table->string('menutype');
            $table->string('keyword')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->nullable();
            $table->string('fileupload')->nullable();
            $table->string('url')->nullable();
            $table->string('menu_position');
            $table->string('banner_image');
            $table->integer('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};