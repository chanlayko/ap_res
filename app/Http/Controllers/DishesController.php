<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('kitchen.dish_create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish;
        $dish->name = $request->name;
        $dish->category_id = $request->category;
        
        $imageName = date('YmdHis').'.'.request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('/images'),$imageName);
        $dish->image = $imageName;

        $dish->save();

        return redirect('dish')->with('massage','Dished Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $category = Category::all();
        return view('kitchen.dish_show',compact('dish','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $category = Category::all();
        return view('kitchen.dish_edit',compact('dish','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate([
            'name'=>'required',
            'category'=>'required',
        ]);
        $dish->name = $request->name;
        $dish->category_id = $request->category;
        if($request->dish_image)
        {
            $imageName = date('YmdHis').'.'.request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('/images'),$imageName);
            $dish->image = $imageName;
        }
        $dish -> save();

        return redirect('dish')->with('massage','Update Your Dish Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dish')->with('massage','Deleteing Your Dish Successfully');
    }
}
