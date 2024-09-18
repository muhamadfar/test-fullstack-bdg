<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;

class CateringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $query = Merchant::query();

        if ($request->has('location')) {
            $query->where('address', 'like', '%' . $request->input('location') . '%');
        }
    
        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }
    
        $merchants = $query->get();
        return view('customer.catering.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date|after:today',
        ]);
    
        $menu = Menu::findOrFail($request->menu_id);
        $totalPrice = $menu->price * $request->quantity;
    
        Order::create([
            'user_id' => auth()->user()->id,
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'delivery_date' => $request->delivery_date,
            'total_price' => $totalPrice,
        ]);
    
        return redirect()->back()->with('success', 'Order placed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merchant = Merchant::findOrFail($id);
        $menus = $merchant->menus; 
        return view('customer.catering.show', compact('merchant', 'menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
