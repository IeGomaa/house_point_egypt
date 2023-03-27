<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->enum('property', ['rent', 'sale']);
            $table->double('price');
            $table->unsignedInteger('surface_area');
            $table->json('title');
            $table->enum('status', ['excellent', 'very good', 'good', 'normal']);
            $table->unsignedSmallInteger('number_of_rooms');
            $table->unsignedSmallInteger('number_of_bathrooms');
            $table->text('description');
            $table->date('date');
            $table->enum('type', ['commercial', 'residential']);
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_address');
            $table->text('video');
            $table->json('tag');
            $table->unsignedSmallInteger('rate');
            $table->unsignedInteger('rate_number');
            $table->unsignedInteger('views');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('area_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_area_id')->constrained()->cascadeOnDelete();
            $table->foreignId('property_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('floor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('furniture_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
