<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Str::random(10)

class ProductFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Product::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$types_arr = [
			'Шампунь',
			'Кондиціонер',
			'Маска',
			'Ампули',
			'Молочко',
			'Лосьйон',
			'Еліксир',
			'Спрей',
			'Колорінг',
			'Стайлінг',
			'Захист',
			'Крем для волосся',
			'Олія',
			'Набір',
			'Гель-вуаль',
		];

		return [
			'title' => $this->faker->city,
			'price' => $this->faker->randomFloat(2, 1, 999),
			'articul' => $this->faker->postcode,
			'descr' => $this->faker->paragraph(5),
			'type' => $types_arr[random_int(0, count($types_arr)-1)], // случайный элемент из $types_arr
			'brand' => $this->faker->state,
			'seria' => $this->faker->citySuffix,
			'gender' => ['men','women','all'][ random_int(0, 2)],
			'amount' => random_int(0, 30),
			'helth' => random_int(0, 1),
			'salon' => random_int(0, 1),
			'reconstruction' => random_int(0, 1),
			'protection' => random_int(0, 1),
			'coloring' => random_int(0, 1),
			'stratening' => random_int(0, 1),
			'natural' => random_int(0, 1),
			'curl' => random_int(0, 1),
			'skin' => random_int(0, 1),
			'yellow' => random_int(0, 1),
			'volume' => random_int(0, 1),
			'sebo' => random_int(0, 1),
			'lupa' => random_int(0, 1),
			'loss' => random_int(0, 1),
		];
	}
}
// $table->string('articul')->nullable();
// $table->text('descr')->nullable();
// $table->string('type')->nullable(); // вид продукции
// $table->string('brand')->nullable(); // 
// $table->string('seria')->nullable();
// $table->string('amount')->nullable(); // 
// $table->tinyInteger('helth')->default(0);
// $table->tinyInteger('salon')->default(0);
// $table->tinyInteger('reconstruction')->default(0);
// $table->tinyInteger('protection')->default(0);
// $table->tinyInteger('coloring')->default(0);
// $table->tinyInteger('stratening')->default(0);
// $table->tinyInteger('natural')->default(0);
// $table->tinyInteger('curl')->default(0);
// $table->tinyInteger('skin')->default(0);
// $table->tinyInteger('yellow')->default(0);
// $table->tinyInteger('volume')->default(0);
// $table->tinyInteger('sebo')->default(0);
// $table->tinyInteger('lupa')->default(0);
// $table->tinyInteger('loss')->default(0);
// $table->string('gender')->nullable(); // men, women, all