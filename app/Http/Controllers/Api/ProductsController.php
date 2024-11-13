<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsCollection;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function get_products()
    {
        try {
            $products = Product::orderBy('created_at', 'desc')->get()->groupBy('category_id');
            $productsCollection = [];
    
            foreach ($products as $category_id => $productGroup) {
            $category = Category::find($category_id,);
                $productsCollection[] = [
                    'category_name' => $category->name,
                    'products' => ProductsCollection::collection($productGroup)->values(),
                ];
            }
    
            return response()->json([
                'data' => $productsCollection,
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
