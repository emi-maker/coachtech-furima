<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);

        return view('purchase.create', compact('item'));
    }

    public function store(PurchaseRequest $request)
    {
        $item = Item::findOrFail($request->item_id);
        //認証する鍵
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
        'price_data' => [
            'currency' => 'jpy',
            'product_data' => [
                'name' => 'test item',
            ],
            'unit_amount' => $item->price,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => url('/purchase/success?item_id=' . $request->item_id),
    'cancel_url' => url()->previous(),
    ]);

    return redirect($session->url);
    }

    public function success(Request $request)
    {

    //購入履歴保存
    Purchase::create([
        'user_id' => auth()->id(),
        'item_id' => $request->item_id,
        'payment_method' => $request->payment_method,
        ]);

    // 商品をSOLDにする
        $item =Item::findOrFail($request->item_id);

        $item->buyer_id = auth()->id();
        $item->save();

    return redirect('/mypage');
    }

    public function editAddress(Item $item)
    {
        return view('purchase.address', compact('item'));
    }

    public function updateAddress(Request $request, $item)
    {
    session([
        'shipping_postcode' => $request->post_code,
        'shipping_address' => $request->address,
    ]);

        return redirect()->route('purchase.create', $item);
    }

}
