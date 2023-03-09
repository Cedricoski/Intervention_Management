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
        Schema::create('interventions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('date');
            $table->boolean('status');
            $table->string('image')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('client_id')->nullable()->unsigned();
            $table->integer('type_interventions_id')->nullable()->unsigned();
            $table->integer('solution_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('type_interventions_id')->references('id')->on('type_interventions')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
