<?php

namespace App\Http\Controllers;

use App\Product;
use App\Project;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('pages.product.create', compact('projects', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required',
            'category_id' => 'required',
            'project_id' => 'required',
        ]);

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->details = $request->details;
        $newProduct->category_id = $request->category_id;
        $newProduct->project_id = $request->project_id;
        $newProduct->save();

        return redirect(route('product.index'));
    }

    public function show(int $id)
    {
        $product = Product::find($id);
        return view('pages.product.show', [
            'product' => $product,
        ]);
    }

    public function edit(int $id)
    {
        $product = Product::find($id);
        return view('pages.product.edit', [
            'product' => $product , 'projects' => Project::all(), 'categories' => Category::all()
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required',
            'category_id' => 'required',
            'project_id' => 'required',
        ]);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->details = $request->details;
        $product->category_id = $request->category_id;
        $product->project_id = $request->project_id;
        $product->save();

        return redirect(route('product.index'));
    }

    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect(route('product.index'));
    }
}

