<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the input
        $request->validate([
            'name'  => 'required|string|min:6|unique:items',
            'category' => 'required',
            'item_pic'  => 'required',
            'description'   => 'required|min:20',
            'price' =>  'required|numeric',
            'food_type' => ['required', 'in:veg,non-veg']
        ]);
        //Get The Category If It exists
        $category = Category::findOrFail($request->category);

        //Save The Item Image
        if($request->hasfile('item_pic')) {
            $filename = $request->file('item_pic')->store('item_pic', 'public');
        }

        //Store the input
        $item = new Item([
            'name'  =>  $request->get('name'),
            'item_pic'  => $filename,
            'description' => $request->get('description'),
            'price' =>  $request->get('price'),
            'food_type' =>  $request->get('food_type'),
            'is_available'  =>  'yes',
        ]);

        $category = $category->items()->save($item);
        flash('Successfully Added '.$request->get('name'))->success();
        return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name'  => 'required|string|min:6|unique:items,name,'.$item->id,
            'category' => 'required',
            'description'   => 'required|min:20',
            'price' =>  'required|numeric',
            'food_type' => ['required', 'in:veg,non-veg']
        ]);

        //Get The Category If It exists
        $category = Category::findOrFail($request->get('category'));
        $filename = "";
        //Save The Item Image
        if($request->hasfile('item_pic')) {
            $filename = $request->file('item_pic')->store('item_pic', 'public');
        } else {
            $filename = $item->item_pic;
        }

        $item->category_id = $category->id;

        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->price = $request->get('price');
        $item->food_type = $request->get('food_type');
        $item->item_pic = $filename;
        $item->save();

        flash('Successfully updated '.$request->get('name'))->success();
        return redirect('/item/'.$item->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        flash('Successfully Deleted The Product!')->success();
        return redirect('/item');
    }

}
