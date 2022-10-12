<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategotyController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.category.index' )->with( [
            'categories' => Category::orderBy( 'name', 'ASC' )->paginate( 5 ),
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.category.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name' => ['required', 'max:255', 'string'],
        ] );

        Category::create( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );

        return redirect()->route( 'category.index' )->with( 'success', 'Category Created Successfull' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Category $category ) {
        return view( 'backend.category.edit' )->with( [
            'category' => $category,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Category $category ) {
        $request->validate( [
            'name' => ['required', 'max:255', 'string'],
        ] );

        $category->update( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );

        return redirect()->route( 'category.index' )->with( 'success', 'Category Updated Successfull' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category ) {
        $category->delete();

        return redirect()->route( 'category.index' )->with( 'success', 'Category has been Deleted!' );
    }
}
