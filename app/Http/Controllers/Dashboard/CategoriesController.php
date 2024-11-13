<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return redirect()->back()->withSuccess("Category has been added successfully");
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
        $category = Category::find($id);
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->save();

            return redirect()->back()->withSuccess("Category has been updated successfully");
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
            $category = Category::find($id);
            Product::where('category_id', $category->id)->delete();
            $category->delete();
            return redirect()->route('categories.index')->withSuccess("Category has been deleted successfully");
        } catch (\Throwable $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
