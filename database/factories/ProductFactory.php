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
			'shampoo', //'Шампунь',
			'conditioner',//'Кондиціонер',
			'mask',//'Маска',
			'ampule',//'Ампули',
			'milk',//'Молочко',
			'lotions', //'Лосьйон',
			'elixir',//'Еліксир',
			'spray',//'Спрей',
			'coloring',//'Колорінг',
			'styling',//'Стайлінг',
			'protection',//'Захист',
			'cream',//'Крем для волосся',
			'oil','Олія',
			'kit',//'Набір',
			'veil',//'Гель-вуаль',
		];

		$brands_arr = [
			'farmavita',
			'davines',
			'joico',
			'profistyle',
			'felps',
			'schwarzkopf',
			'mirella',
			'altrego'
		];

		$serias_arr = [
			"amethyste",
			"omniplex" ,
			"argan"    ,
			"onely"    ,
			"bioxil"   ,
			"kliss"    ,
			"linea"    ,
			"oi"       ,
			"hydra"    ,
			"colori"   ,
			"colorb"   ,
			"kpack"    ,
			"style"    ,
			"moisture" ,
			"blond"    ,
			"defy"     ,
			"joifull"  ,
			"shake"    ,
			"tricogen" ,
			"beeform"  ,
			"blondpink",
			"naturalt" ,
			"essential",
			"antiloss" ,
			"sebum"    ,
			"osis"     ,
		];

		return [
			'title' => $this->faker->city,
			'price' => $this->faker->randomFloat(2, 1, 999),
			'articul' => $this->faker->postcode,
			'descr' => $this->faker->paragraph(5),
			'image' => '//lorempixel.com/500/600/fashion/?t='.microtime(),
			'type' => $types_arr[random_int(0, count($types_arr)-1)], // случайный элемент из $types_arr
			'brand' => $brands_arr[random_int(0, count($brands_arr)-1)], // случайный элемент из $brands_arr,
			'seria' => $serias_arr[random_int(0, count($serias_arr)-1)], // случайный элемент из $serias_arr,
			'gender' => ['men','women','all'][ random_int(0, 2)],
			'amount' => random_int(0, 30),
			'dry' => random_int(0, 1),
			'fatter' => random_int(0, 1),
			'lamina' => random_int(0, 1),
			'clarified' => random_int(0, 1),
			'alltype' => random_int(0, 1),
			'health' => random_int(0, 1),
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