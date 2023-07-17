<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('cake.index', ['cakes' => Cake::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cake.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image'
        ]);

        $cake = new Cake;
        $cake->name = $validated['name'];
        $cake->description = $validated['description'];
        $cake->price = $validated['price'];
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/cakes/' . $filename);
            Image::make($image)->save($path);
            $cake->image = $filename;
        }
        
        $cake->save();

        $cake->categories()->attach($validated['category']);
 
        return redirect(route('cakes.index'))->with('status', 'Cake successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cake $cake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cake $cake)
    {
        $cake->load('categories');
        return view('cake.edit', ['cake' => $cake, 'categories_for_select' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cake $cake)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image'
        ]);

        $cake->name = $validated['name'];
        $cake->description = $validated['description'];
        $cake->price = $validated['price'];
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/cakes/' . $filename);
            Image::make($image)->save($path);
            $cake->image = $filename;
        }
        
        $cake->update();

        $cake->categories()->attach($validated['category']);
 
        return redirect(route('cakes.index'))->with('status', 'Cake successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cake $cake)
    {
        $cake->delete();
 
        return redirect(route('cakes.index'));
    }
}
