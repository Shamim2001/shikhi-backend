<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.course.index' )->with( [
            'courses' => Course::orderBy( 'name' )->paginate( 5 ),
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.course.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        // dd( $request->all() );
        // $request->validate( [
        //     'name'         => ['required', 'max:255', 'string'],
        //     'requirements' => ['required', 'string'],
        //     'statused'     => ['required', 'not_in:none'],
        //     'description'  => ['required'],
        //     'audience'     => ['required'],
        //     'category'     => ['required', 'not_in:none'],
        // ] );

        $thumb = '';
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            $thumb = time() . '-' . $request->file( 'thumbnail' )->getClientOriginalName();
            $thumb = str_replace( ' ', '-', $thumb );

            $request->file( 'thumbnail' )->storeAs( 'public/uploads/courses', $thumb );
        }

        Course::create( [
            'name'         => $request->name,
            'slug'         => 'name',
            'requirements' => $request->requirements,
            'status'       => $request->statused,
            'description'  => $request->description,
            'audience'     => $request->audience,
            'category_id'  => $request->category_id,
            'thumbnail'    => $thumb,
        ] );

        return redirect()->route( 'course.index' );
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
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
