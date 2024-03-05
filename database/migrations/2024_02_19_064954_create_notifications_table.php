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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('language');
            $table->string('title');    
            $table->string('notificationtype');
            $table->string('menutype');
            $table->string('keyword')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->nullable();
            $table->string('fileupload')->nullable();
            $table->string('url')->nullable();
            $table->date('startdate')->nullable();;
            $table->date('enddate')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
