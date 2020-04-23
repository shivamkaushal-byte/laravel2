<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;

use App\Http\Requests\categories\CreatecategoryRequest;

use App\Http\Requests\categories\UpdatecategoryRequest;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('categories.index')->with('categories',category::all());
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categories.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatecategoryRequest $request)
    {

      // $data=request()->all();
      // $category= new category(); this is a first method to inject values in database
      // $category->name = $data['name'];
      // $category->save();
      category::create([
        'name' => $request->name
      ]);

      return redirect(route('categories.index'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = category::find($id);
      return view('categories.edit')->with('category',$data);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {

      $category->name = $request->name;
      $category->save();
      return  redirect(route('categories.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  $category = category::find($id);
  $category->delete();
   return redirect(route('categories.index'));

        //
    }
}
