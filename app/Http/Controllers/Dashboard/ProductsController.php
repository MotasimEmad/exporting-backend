<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesStoreRequest;
use App\Http\Requests\ServicesUpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::all();
        return view('dashboard.products.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesStoreRequest $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->save();

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $reversed_files = array_reverse($files);
                foreach ($reversed_files as $file) {
                    $filename = date('YmdHi') . str_replace(' ', '', $file->getClientOriginalName());
                    $file->storeAs('public/images/products', $filename);
                    Storage::setVisibility('public/images/products/' . $filename, 'public');

                    $product_image = new ProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->image = $filename;
                    $product_image->save();
                }
            }
            return redirect()->back()->withSuccess("Product has been added successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories  = Category::all();
        $product = Product::find($id);
        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesUpdateRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if ($request->hasFile('image')) {
                if (Storage::exists('public/images/products/' . $product->image)) {
                    Storage::delete('public/images/products/' . $product->image);
                }

                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->storeAs('public/images/products', $filename);
                Storage::setVisibility('public/images/products/' . $filename, 'public');
                $product['image'] = $filename;
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->save();

            return redirect()->back()->withSuccess("Product has been updated successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);

            if (Storage::exists('public/images/products/' . $product->image)) {
                Storage::delete('public/images/products/' . $product->image);
            } else {
                return redirect()->back()->withErrors("No image found !");
            }
            $product->delete();
            return redirect()->route('products.index')->withSuccess("Product has been deleted successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
