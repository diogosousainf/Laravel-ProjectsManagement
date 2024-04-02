<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index', [
            'categories' => $categories,
        ]);
    }


    public function create()
    {
        return view('pages.Category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $newCategory = new Category();
        $newCategory->name = $request->name;

        $newCategory->save();

        return redirect(route('category.index'));
    }


    public function show(int $id)
    {
        $category = Category::find($id);
        return view('pages.category.show', [
            'category' => $category,
        ]);
    }

    public function edit(int $id)
    {
        $category = category::find($id);
        return view('pages.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect(route('category.index'));
    }

    public function destroy(int $id)
    {
        $category = Category::find($id);

        if (count($category->products) < 1){
            $category->delete();
            return redirect(route('category.index'));
        }
        return redirect(route('category.index'))->with('error', 'You can not delete this category because it has products');
    }
}
