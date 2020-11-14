<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('articul')->nullable();
            $table->string('image')->nullable();
            $table->text('descr')->nullable();
            $table->string('type')->nullable(); // вид продукции
            $table->string('brand')->nullable(); // 
            $table->string('seria')->nullable();
            $table->string('amount')->nullable(); // 
            $table->tinyInteger('helth')->default(0);
            $table->tinyInteger('salon')->default(0);
            $table->tinyInteger('reconstruction')->default(0);
            $table->tinyInteger('protection')->default(0);
            $table->tinyInteger('coloring')->default(0);
            $table->tinyInteger('stratening')->default(0);
            $table->tinyInteger('natural')->default(0);
            $table->tinyInteger('curl')->default(0);
            $table->tinyInteger('skin')->default(0);
            $table->tinyInteger('yellow')->default(0);
            $table->tinyInteger('volume')->default(0);
            $table->tinyInteger('sebo')->default(0);
            $table->tinyInteger('lupa')->default(0);
            $table->tinyInteger('loss')->default(0);
            $table->string('gender')->nullable(); // men, women, all
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
        Schema::dropIfExists('products');
    }
}
