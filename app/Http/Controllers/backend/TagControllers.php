<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagControllers extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.tag.index' )->with( 'tags', Tag::orderBy( 'name', 'ASC' )->paginate( 5 ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.tag.create' );
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

        Tag::create( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );

        return redirect()->route( 'tag.index' )->with( 'success', 'Tag Created Successfull' );
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
    public function edit( Tag $tag ) {
        return view( 'backend.tag.edit' )->with( 'tag', $tag );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Tag $tag ) {
        $request->validate( [
            'name' => ['required', 'max:255', 'string'],
        ] );

        $tag->update( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );

        return redirect()->route( 'tag.index' )->with( 'success', 'Tag Updated Successfull' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Tag $tag ) {
        $tag->delete();

        return redirect()->route('tag.index')->with('success', 'Tag has been deleted!');
    }
}
