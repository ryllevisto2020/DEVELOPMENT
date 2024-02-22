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
        Schema::create('flight_models', function (Blueprint $table) {
            // -> create a column inside your data table with different data type input $table-><'data type'>('<column name>',<optional: length of input>)
            // -> data type is (String, Integer,Float,Decimal,etc)
            // -> example ($table->string('name'),25) -> name with input length of 25
            // -> example ($table->integer('id'))
            // -> after the configuration go to terminal and type php artisan migrate
            $table->id();
            $table->string('flight_name');
            $table->string('flight_dest');
            $table->string('flight_from');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_models');
    }
};
