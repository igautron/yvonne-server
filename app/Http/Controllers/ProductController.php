<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    	// Product::factory(10)->create();

    	return [
    		'status' => 'ok',
    		'products' => Product::all(),
    	];
    }

    public function filter(Request $request)
    {
        $filter_types = $request->get('types');
        $filter_types = json_decode($filter_types, true);
        $product = Product::where('id','>',111110);
        foreach ($filter_types as $type => $value) {
            $product->orWhere('type', $type);
        }
        $product = $product->get();
        return[
            'filter_types' => $filter_types,
            'products' => $product,
            'count' => count($product),
        ];
    }

    public function show($id)
    {
    	// dd($id);
    	return [
    		'status' => 'ok',
    		'data' => Product::find($id),
    	];
    }
}
