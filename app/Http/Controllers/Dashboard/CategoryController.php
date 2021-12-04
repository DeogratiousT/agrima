<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Category;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Storage;
use App\Laratables\CategoriesLaratables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return Laratables::recordsOf(Category::class, CategoriesLaratables::class);
        }

        $categories = Category::all()->count();

        return view('admin.categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
            'cover_image' => 'required|image',
        ]);

        $category = Category::firstOrNew([
            'name' => $validated['name'],
        ]);

        //Handle File upload
        if($validated['cover_image']){
            //Get File Name with the Extension
            $filenameWithExt = $validated['cover_image']->getClientOriginalName();
            //Get just File name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $validated['cover_image']->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.Str::random('5').'.'.$extension;
            //Upload Image
            // $path = $validated['cover_image']->storeAs('featured-images', $fileNameToStore, 'public_uploads');
            Storage::disk('category_uploads')->putFileAs('category-images', new File($validated['cover_image']), $fileNameToStore);

            $category->cover_image = $fileNameToStore;

        }

        $category->save();

        return redirect()->route('categories.index')->with('success','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
            'cover_image' => 'nullable|image',
        ]);

        $category->name = $validated['name'];

        //Handle File upload
        if(isset($validated['cover_image'])){
            //Get File Name with the Extension
            $filenameWithExt = $validated['cover_image']->getClientOriginalName();
            //Get just File name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $validated['cover_image']->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.Str::random('5').'.'.$extension;
            //Upload Image
            // $path = $validated['cover_image']->storeAs('featured-images', $fileNameToStore, 'public_uploads');
            Storage::disk('category_uploads')->putFileAs('category-images', new File($validated['cover_image']), $fileNameToStore);

            $category->cover_image = $fileNameToStore;

        }

        $category->save();

        return redirect()->route('categories.index')->with('success','Category Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
