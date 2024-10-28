<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function get_products()
    {
        try {
            $products = ProductsCollection::collection(Product::orderBy('created_at', 'desc')->get());
            return response()->json([
                'data' => $products->values(),
            ]);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }

    public function get_product_by_id(Request $request)
    {
        try {
            $check_product = Product::where('id', $request->query('id'))->first();
            if (!$check_product) {
                return response()->error('Not found', 404);
            }
            $product = ProductsCollection::collection(Product::where('id', $request->query('id'))->get())->first();
            return response()->success($product);

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }
}
