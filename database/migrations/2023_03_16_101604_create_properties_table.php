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
            $table->unsignedSmallInteger('surface_area');
            $table->string('title');
            $table->enum('property_status', ['excellent', 'very good', 'good', 'normal']);
            $table->unsignedTinyInteger('room_num');
            $table->unsignedTinyInteger('bathroom_num');
            $table->text('description');
            $table->date('date');
            $table->enum('comm', ['commercial', 'residential']);
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_address');
            $table->mediumText('youtube');
            $table->unsignedTinyInteger('rate');
            $table->unsignedSmallInteger('rate_num');
            $table->unsignedSmallInteger('views');
            $table->foreignId('area_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_area_id')->constrained()->cascadeOnDelete();
            $table->foreignId('property_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('flooring_id')->constrained()->cascadeOnDelete();
            $table->foreignId('flooring_num_id')->constrained()->cascadeOnDelete();
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
