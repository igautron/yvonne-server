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
            $table->text('descr')->nullable();
            $table->text('descr2')->nullable();
            $table->text('descr3')->nullable();
            $table->text('image')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('articul')->nullable();
            $table->string('type')->nullable(); // вид продукции
            $table->string('brand')->nullable(); // 
            $table->string('gender')->nullable(); // 
            $table->string('country')->nullable(); // 
            $table->string('seria')->nullable();
            $table->string('amount')->nullable(); //
            $table->tinyInteger('dry')->default(0);
            $table->tinyInteger('fatter')->default(0);
            $table->tinyInteger('lamina')->default(0);
            $table->tinyInteger('clarified')->default(0);
            $table->tinyInteger('alltype')->default(0);
            $table->tinyInteger('health')->default(0);
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
