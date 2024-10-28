<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesStoreRequest;
use App\Http\Requests\ServicesUpdateRequest;
use App\Models\Product;
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
        return view('dashboard.products.index');
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
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->storeAs('public/images/products', $filename);
                Storage::setVisibility('public/images/products/' . $filename, 'public');
                $product['image'] = $filename;
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();

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
        $product = Product::find($id);
        return view('dashboard.products.edit', [
            'product' => $product
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
