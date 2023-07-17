<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index', ['orders' => Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create', ['cakes' => Cake::all()]);
    }

    /**
     * Store a newly created resource in storage.
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

        return redirect(route('orders.index'))->with('status', 'Order successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('cake');
        return view('order.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order->load('cake');
        return view('order.edit', ['order' => $order, 'cakes' => Cake::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
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

        $order->update($validated);
 
        return redirect(route('orders.index'))->with('status', 'Order successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
 
        return redirect(route('orders.index'));
    }
}
