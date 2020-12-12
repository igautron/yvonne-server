<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'products',
    ];

    public $total_price = 0;

    public function addProducts($products_arr_new)
    {
  //   	$products_arr = [
		// 	'2' => 6
		// 	'3' => 4
		// ];
    	$products_arr = json_decode($this->products, true);
    	foreach ($products_arr_new as $product_id => $amount) {
    		if (isset($products_arr[$product_id]) && $products_arr[$product_id]) {
    			$products_arr[$product_id] = $products_arr[$product_id] + $amount;
    		}else{
    			$products_arr[$product_id] = $amount;
    		}
    	}
    	$this->update(['products' => json_encode($products_arr)]);
    }

    public function getProducts()
    {
    	$cart_arr = json_decode($this->products, true);

    	$products_arr = [];
    	foreach ($cart_arr as $product_id => $amount) {
    		$product = Product::find($product_id);
    		$sum_price = round($product->price * $amount, 2);
    		$products_arr[] = [
    			'id' => $product->id,
    			'image' => $product->image,
    			'title' => $product->title,
    			'descr' => $product->descr,
    			'amount' => $amount,
    			'sum_price' => $sum_price,
    		];
    		$this->total_price += $sum_price;
    	}
    	return $products_arr;
    }

    public function getTotalPrice()
    {
    	return round($this->total_price, 2);
    }

    public function removeItem($product_id)
    {
    	$cart_arr = json_decode($this->products, true);
    	unset($cart_arr[$product_id]);
    	$this->products = json_encode($cart_arr);
    	$this->save();
    }
}
