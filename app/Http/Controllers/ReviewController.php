<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Review;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Helpers\TextHelper;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('review.index', ['reviews' => Review::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review.create', ['cakes' => Cake::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'review_rating' => 'required|min:1|max:5',
            'review_title' => 'nullable',
            'review_text' => 'nullable',
            'image' => 'image|nullable',
            'approved' => 'boolean',
            'cake_id' => 'required'
        ]);

        $review = new Review($validated);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = TextHelper::transformText($validated['name']) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/reviews/' . $filename);
            Image::make($image)->save($path);
            $review->image = $filename;
        }
 
        $cake = Cake::find($validated['cake_id']);
        
        $cake->reviews()->save($review);

        return redirect(route('reviews.index'))->with('status', 'Review successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        $review->load('cake');
        return view('review.show', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('review.edit', ['cakes' => Cake::all(), 'review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'review_rating' => 'required|min:1|max:5',
            'review_title' => 'nullable',
            'review_text' => 'nullable',
            'image' => 'image|nullable',
            'approved' => 'boolean',
            'cake_id' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = TextHelper::transformText($validated['name']) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/reviews/' . $filename);
            Image::make($image)->save($path);
            $review->image = $filename;
        }

        $review->update($validated);

        return redirect(route('reviews.index'))->with('status', 'Review successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
 
        return redirect(route('reviews.index'))->with('status', 'Review deleted!');
    }
}
