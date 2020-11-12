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
    		'data' => Product::all(),
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
