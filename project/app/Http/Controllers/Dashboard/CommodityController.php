<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Category;
use App\Models\Products\Commodity;
use App\Http\Controllers\Controller;
use App\Models\Products\SubCategory;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Storage;
use App\Laratables\CommoditiesLaratables;

class CommodityController extends Controller
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
            return Laratables::recordsOf(Commodity::class, CommoditiesLaratables::class);
        }

        $commodities = Commodity::all()->count();

        return view('admin.commodities.index', ['commodities'=>$commodities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.commodities.create', ['categories'=>$categories, 'subCategories'=>$subCategories]);
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
            'name' => 'required|unique:commodities,name',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'cover_image' => 'required|image',
        ]);

        $commodity = Commodity::firstOrNew(
            [
                'name' => $validated['name'],
            ],
            [
                'sub_category_id' => $validated['sub_category_id'],
                'quantity' => $validated['quantity'],
                'price' => $validated['price'],
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
            Storage::disk('s3')->putFileAs('commodity-images', new File($validated['cover_image']), $fileNameToStore);

            $commodity->cover_image = $fileNameToStore;

        }

        $commodity->save();

        return redirect()->route('dashboard.commodities.index')->with('success','Commodity Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodity $commodity)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.commodities.edit', ['commodity'=>$commodity, 'categories'=>$categories, 'subCategories'=>$subCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'cover_image' => 'nullable|image',
        ]);

        $commodity->update(
            [
                'name' => $validated['name'],
                'sub_category_id' => $validated['sub_category_id'],
                'quantity' => $validated['quantity'],
                'price' => $validated['price'],
                'sub_category_id' => $validated['sub_category_id'],
            ]
        );

        //Handle File upload
        if(isset($validated['cover_image'])){

            // Delete Current Cover Image
            $filetodelete = Storage::disk('s3')->path('commodity-images/' . $commodity->cover_image);
            
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
            Storage::disk('s3')->putFileAs('commodity-images', new File($validated['cover_image']), $fileNameToStore, );

            $commodity->cover_image = $fileNameToStore;

        }

        $commodity->save();

        return redirect()->route('dashboard.commodities.index')->with('success','Commodity Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        $filetodelete = Storage::disk('s3')->path('commodity-images/' . $commodity->cover_image);

        $commodity->delete();

        // Delete Current Cover Image
        if (Storage::disk('s3')->exists($filetodelete)) {
            Storage::disk('s3')->delete($filetodelete);
        }

        return redirect()->route('dashboard.commodities.index')->with('success','Commodity Deleted Successfully');
    }
}
