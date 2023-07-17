<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Chef;
use App\Models\Order;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopPublicController extends Controller
{
    /**
     * Display SHOP categories page.
     */
    public function index()
    {
        $categoriesCollection = Category::with('cakes')->get();
        return view('shop.cakes.index', ['categories' => $categoriesCollection]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Order in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'zipcode' => 'required',
            'city' => 'required|string',
            'address' => 'required',
            'shipping_at' => 'required',
            'comment' => 'string|nullable',
            'cake_id' => 'required'
        ]);

        $order = new Order($validated);
 
        $cake = Cake::find($validated['cake_id']);
        
        $cake->orders()->save($order);

        return redirect(route('shop.cakes.index'))->with('status', 'Order send successfully!');
    }

    /**
     * Display SHOP home page.
     */
    public function showHome()
    {
        $highlighted =  Category::with('cakes')->where('is_highlighted', '=', 1)->get();
        $reviews = DB::table('reviews')->where('approved', '=', 1)->take(3)->get();
        return view('shop.home', ['categories' => $highlighted, 'chefs' => Chef::all(), 'reviews' => $reviews]);
    }

    /**
     * Display SHOP reviews page.
     */
    public function showReviews()
    {
        return view('shop.reviews', ['reviews' => Review::all()]);
    }

    /**
     * Display SHOP cake page.
     */
    public function show(string $id)
    {
        $cake = Cake::find($id);
        return view('shop.cakes.show', ['cake' => $cake]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
