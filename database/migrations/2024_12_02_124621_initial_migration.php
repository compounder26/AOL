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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->string('title');
            $table->date('dateTime');
            $table->string('organizer');
            $table->string('orgEmail');
            $table->string('location');
            $table->string('image');
            $table->text('description');
            $table->string('note');
            $table->integer('quota');
            $table->timestamps();
        });

        Schema::create('user_events', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('event_id')->constrained('events', 'id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropAllTables();
    }
};
