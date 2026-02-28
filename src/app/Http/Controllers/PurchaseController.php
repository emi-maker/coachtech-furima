<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);

        return view('purchase.create', compact('item'));
    }

    public function store(Request $request)
    {
        Purchase::create([
        'user_id' => auth()->id(),
        'item_id' => $request->item_id,
        'payment_method' => $request->payment_method,
    ]);

        return redirect('/mypage');
    }

    public function editAddress($itemId)
    {
        return view('purchase.address', compact('itemId'));
    }

    public function updateAddress(Request $request, $itemId)
    {
    session([
        'shipping_postcode' => $request->postal_code,
        'shipping_address' => $request->address,
    ]);

        return redirect()->route('purchase.create', $itemId);
    }

}
