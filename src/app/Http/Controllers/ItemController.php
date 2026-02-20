<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::withCount(['favoritedUsers','comments'])->findOrFail($id);

        $isFavorite = auth()->check()
        ? auth()->user()->favorites->contains($item->id)
        : false;

        return view('items.show', compact('item', 'isFavorite'));
    }

    public function index(Request $request)
    {

        if ($request->tab === 'mylist' && auth()->check()) {

        $items = Item::withCount('favoritedUsers')
            ->whereHas('favoritedUsers', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();

    } else {
        $items = Item::withCount('favoritedUsers')->get();
    }

    return view('items.index', compact('items'));
    }

   
    public function create()
    {
       $categories = Category::all(); 
       $statuses = Status::all();

        return view('sell',compact('categories','statuses'));
    }

    public function store(Request $request)
    {

        $item = Item::create([
            'name' => $request->name,
            'img' => $request->img,
            'price' => $request->price,
            'description' => $request->description,
            'brand' => $request->brand,
            'user_id' => auth()->id(),
    ]);

        if ($request->has('categories')) {
        $item->categories()->attach($request->categories);
    }

        return redirect('/');
    }

    public function toggleFavorite(Item $item)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->favorites()->toggle($item);
        
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