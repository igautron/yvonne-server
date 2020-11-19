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
        // dd($request->has('types'));
        if ($request->has('filter')) {
            $json = $request->get('filter');
            $filter_values = json_decode($json, true);

            $product = Product::where('id','>',1);

            if (isset($filter_values['types'])) {
                $filter_types = $filter_values['types'];
                $product->where(function($q) use ($filter_types){
                    foreach ($filter_types as $type => $one) {
                        $q->orWhere('type', $type);
                    }
                });
            }

            if (isset($filter_values['brands'])) {
                $filter_brands = $filter_values['brands'];
                $product->where(function($q) use ($filter_brands){
                    foreach ($filter_brands as $brand => $one) {
                        $q->orWhere('brand', $brand);
                    }
                });
            }

            if (isset($filter_values['series'])) {
                $filter_series = $filter_values['series'];
                $product->where(function($q) use ($filter_series){
                    foreach ($filter_series as $seria => $one) {
                        $q->orWhere('seria', $seria);
                    }
                });
            }

            if (isset($filter_values['amount'])) {
                $filter_amount = $filter_values['amount'];
                $product->where(function($q) use ($filter_amount){
                    foreach ($filter_amount as $amount => $one) {
                        $q->orWhere('amount', $amount);
                    }
                });
            }

            if (isset($filter_values['appointments'])) {
                $filter_appointments = $filter_values['appointments'];
                $product->where(function($q) use ($filter_appointments){
                    foreach ($filter_appointments as $appointment => $one) {
                        $q->orWhere($appointment, 1);
                    }
                });
            }

            if (isset($filter_values['gender'])) {
                $filter_gender = $filter_values['gender'];
                $product->where('gender', $filter_gender);
            }

            if ($filter_values['price']) {
                if (isset($filter_values['price']['min'])) {
                    $product->where('price', '>',(int)$filter_values['price']['min']);
                }
                if (isset($filter_values['price']['max'])) {
                    $product->where('price', '<',(int)$filter_values['price']['max']);
                }
            }

            $products = $product->offset(0)->limit(30)->get();
            // dd($products);
            return[
                'filter_values' => $filter_values,
                'products' => $products,
                'count' => count($products),
            ];
        }
        return[
            'filter_values' => 'no values',
            'products' => [],
            'count' => 0,
        ];
    }

    public function show($id)
    {
    	if ($product = Product::find($id)) {
            return [
                'status' => 'ok',
                'data' => $product,
            ];
        }else{
            return [
                'status' => 'error',
                'data' => [],
            ];
        }
    }
}
