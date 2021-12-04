<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Products\Category;
use App\Models\Products\Commodity;
use App\Http\Controllers\Controller;
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
        return view('admin.commodities.create', ['categories'=>$categories]);
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
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'cover_image' => 'required|image',
        ]);

        $commodity = Commodity::firstOrNew(
            [
                'name' => $validated['name'],
            ],
            [
                'category_id' => $validated['category_id'],
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
            Storage::disk('commodities_uploads')->putFileAs('commmodity-images', new File($validated['cover_image']), $fileNameToStore, );

            $commodity->cover_image = $fileNameToStore;

        }

        $commodity->save();

        return redirect()->route('commodities.index')->with('success','Commodity Added Successfully');
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
        return view('admin.commodities.edit', ['commodity'=>$commodity, 'categories'=>$categories]);
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
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'cover_image' => 'nullable|image',
        ]);

        $commodity->update(
            [
                'name' => $validated['name'],
                'category_id' => $validated['category_id'],
                'quantity' => $validated['quantity'],
                'price' => $validated['price'],
            ]
        );

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
            Storage::disk('commodities_uploads')->putFileAs('commmodity-images', new File($validated['cover_image']), $fileNameToStore, );

            $commodity->cover_image = $fileNameToStore;

        }

        $commodity->save();

        return redirect()->route('commodities.index')->with('success','Commodity Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\Commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodity $commodity)
    {
        //
    }
}
