<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\ExhibitionRequest;


class ItemController extends Controller
{
    public function show($item_id)
    {
        $item = Item::withCount(['favoritedUsers','comments'])->findOrFail($item_id);

        $isFavorite = auth()->check()
        ? auth()->user()->favorites->contains($item->id)
        : false;

        return view('items.show', compact('item', 'isFavorite'));
    }

    public function index(Request $request)
    {
        //タブ
        if ($request->tab === 'mylist' && auth()->check()) {

        $items = Item::withCount('favoritedUsers')
            ->whereHas('favoritedUsers', function ($query) {
                $query->where('user_id', auth()->id());
            });

    } else {

        $items = Item::withCount('favoritedUsers');
    }

     // 商品名検索
    if ($request->keyword) {
        $items->where('name', 'like', '%' . $request->keyword . '%');
    }

    $items = $items->get();


        return view('items.index', compact('items'));
    }

   
    public function create()
    {
       $categories = Category::all(); 
       $statuses = Status::all();

        return view('sell',compact('categories','statuses'));
    }

    public function store(ExhibitionRequest $request)
    {

        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'brand' => $request->brand,
            'user_id' => auth()->id(),
            'status_id' => $request->status_id,
    ]);
        //カテゴリー紐づけ
        if ($request->has('categories')) {
            $item->categories()->attach($request->categories);
    }

        // 画像追加
        if ($request->hasFile('img')) {

        $uplodeedImage = $request->file('img');

        $filename = uniqid() . '.jpg';

        $manager = new ImageManager(new Driver());

        $image = $manager->read($uplodeedImage)
        ->scale(width: 1200)
        ->toJpeg(80);

        Storage::disk('public')->put(
        'item/' . $filename,
        (string) $image
        );

        $item->img = 'item/' . $filename;
        $item->save();
    }

        return redirect('/');
    }

    public function toggleFavorite(Item $item_id)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->favorites()->toggle($item_id);
        
        return back();
    }


    public function mylist()
    {
        $items = Auth::user()->favorites;

        return view('items.mylist', compact('items'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $items = Item::where('name', 'like', "%{$keyword}%")->get();

        return view('items.index', compact('items'));
    }


}