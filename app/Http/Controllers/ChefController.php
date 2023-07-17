<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Helpers\TextHelper;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chef.index', ['chefs' => Chef::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'bio' => 'required',
            'facebook_link' => 'url|nullable',
            'instagram_link' => 'url|nullable',
        ]);

        
        $chef_social_links = [
            'facebook' => $validated['facebook_link'] ? $validated['facebook_link'] : '',
            'instagram' => $validated['instagram_link'] ? $validated['instagram_link'] : '',
        ];
        
        $chef = new Chef;
        $chef->name = $validated['name'];
        $chef->bio = $validated['bio'];
        $chef->social_links = json_encode($chef_social_links);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = TextHelper::transformText($validated['name']) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/chefs/' . $filename);
            Image::make($image)->save($path);
            $chef->image = $filename;
        }
        
        $chef->save();

        return redirect(route('chefs.index'))->with('status', 'Chef successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        $chef->social_links = json_decode($chef->social_links, true);
            
        return view('chef.edit', ['chef' => $chef]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'bio' => 'required',
            'facebook_link' => 'url|nullable',
            'instagram_link' => 'url|nullable',
        ]);

        $chef_social_links = [
            'facebook' => $validated['facebook_link'] ? $validated['facebook_link'] : '',
            'instagram' => $validated['instagram_link'] ? $validated['instagram_link'] : '',
        ];
        
        $chef->name = $validated['name'];
        $chef->bio = $validated['bio'];
        $chef->social_links = json_encode($chef_social_links);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = TextHelper::transformText($validated['name']) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/chefs/' . $filename);
            Image::make($image)->save($path);
            $chef->image = $filename;
        }
        
        $chef->update();

        return redirect(route('chefs.index'))->with('status', 'Chef successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        //
    }
}
