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
        //購入履歴保存
        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
            'payment_method' => $request->payment_method,
        ]);

        // 商品をSOLDにする
            $item = Item::findOrFail($request->item_id);

            $item->buyer_id = auth()->id();
            $item->save();

        return redirect('/mypage');
    }

    public function editAddress(Item $item)
    {
        return view('purchase.address', compact('item'));
    }

    public function updateAddress(Request $request, $itemId)
    {
    session([
        'shipping_postcode' => $request->post_code,
        'shipping_address' => $request->address,
    ]);

        return redirect()->route('purchase.create', $itemId);
    }

}
