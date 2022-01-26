<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Category;
use App\Http\Controllers\Controller;
use App\Models\Products\SubCategory;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Storage;
use App\Laratables\SubCategoriesLaratables;

class SubCategorycontroller extends Controller
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
            return Laratables::recordsOf(SubCategory::class, SubCategoriesLaratables::class);
        }

        $subCategories = SubCategory::all()->count();

        return view('admin.sub-categories.index', ['subCategories'=>$subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-categories.create', ['categories'=>$categories]);
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
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'required|image',
        ]);

        $subCategory = SubCategory::firstOrNew(
            [
                'name' => $validated['name']
            ],
            [
                'category_id' => $validated['category_id']
            ]
    );

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
            Storage::disk('s3')->putFileAs('sub-category-images', new File($validated['cover_image']), $fileNameToStore);

            $subCategory->cover_image = $fileNameToStore;

        }

        $subCategory->save();

        return redirect()->route('dashboard.sub-categories.index')->with('success','Sub-Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('admin.sub-categories.edit', ['subCategory'=>$subCategory, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image',
        ]);

        $subCategory->name = $validated['name'];
        $subCategory->category_id = $validated['category_id'];


        //Handle File upload
        if(isset($validated['cover_image'])){

            // Delete Current Cover Image
            $filetodelete = Storage::disk('s3')->path('sub-category-images/' . $subCategory->cover_image);

            if (Storage::disk('s3')->exists($filetodelete)) {
                Storage::disk('s3')->delete($filetodelete);
            }


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
            Storage::disk('s3')->putFileAs('sub-category-images', new File($validated['cover_image']), $fileNameToStore);

            $subCategory->cover_image = $fileNameToStore;

        }

        $subCategory->save();

        return redirect()->route('dashboard.sub-categories.index')->with('success','Sub-Category Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $filetodelete = Storage::disk('s3')->path('sub-category-images/' . $subCategory->cover_image);

        $subCategory->delete();

        // Delete Current Cover Image
        if (Storage::disk('s3')->exists($filetodelete)) {
            Storage::disk('s3')->delete($filetodelete);
        }

        return redirect()->route('dashboard.sub-categories.index')->with('success','Sub-Category Deleted Successfully');
    }
}
