<?php

namespace App\Http\Controllers;

use App\Project;
use App\Product;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = project::all();
        return view('pages.project.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.project.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $newProject = new Project();
        $newProject->name = $request->name;
        $newProject->save();

        $selectedProductsIds = $request->product_id ?? [];

        foreach ($selectedProductsIds as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $newProject->products()->save($product);
            }
        }



        return redirect(route('project.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $project = Project::find($id);
        $products = Product::find($id);
        return view('pages.project.show', ['project' => $project, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $project = Project::find($id);
        $products = Product::all();
        return view('pages.project.edit', ['project' => $project , 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $project = Project::find($id);

        $project->name = $request->name;

        $selectedProductsIds = $request->product_id ?? [];

        $currentProducts = $project->products()->pluck('id')->toArray();

        foreach ($currentProducts as $productId) {
            if (!in_array($productId,  $selectedProductsIds)) {
                $project->products()->where('id', $productId)->delete();
            }
        }

        foreach ($selectedProductsIds as $productId) {
            if (!in_array($productId, $currentProducts)) {
                $product = Product::find($productId);
                if ($product) {
                    $project->products()->save($product);
                }
            }
        }

        $project->save();


        return redirect(route('project.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $project = Project::find($id);

        if (count($project->products) < 1){
            $project->delete();
            return redirect(route('project.index'));
        }
        return redirect(route('project.index'))->with('error', 'You can not delete this projects because it has products');
    }
}
