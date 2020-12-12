<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	$cart_arr = [
    		'product_id' => 'amount'
    	];

    	if (!$request->cart_id) {
    		$cart = Cart::create(['products' => json_encode([
    			$request->product_id => $request->amount,
    		])]);
    	}else{
    		$cart = Cart::find($request->cart_id);
    		$cart->addProducts([
    			$request->product_id => $request->amount,
    		]);
    	}

        return [
            'success' => 'ok',
            'data' => $request->all(),
            'message' => '',
            'cart_id' => $cart->id,
            'cart_products' => $cart->getProducts(),
            'total_price' => $cart->getTotalPrice(),
        ];
    }

    public function removeCartItem(Request $request)
    {
    	$cart = Cart::find($request->cart_id);
    	$cart->removeItem($request->product_id);
        return [
            'success' => 'ok',
            'data' => $request->all(),
            'message' => '',
            'cart_id' => $cart->id,
            'cart_products' => $cart->getProducts(),
            'total_price' => $cart->getTotalPrice(),
        ];
    }
}
