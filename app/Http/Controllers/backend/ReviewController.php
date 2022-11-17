<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.review.index' )->with( 'reviews', Review::latest()->paginate( 10 ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.review.create' )->with( 'courses', Course::get() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'star'      => 'required|numeric|max:5',
            'content'   => 'required',
            'course_id' => 'required|not_in:none',
        ] );

        Review::create( [
            'star'       => $request->star,
            'content'    => $request->content,
            'student_id' => Auth::id(),
            'course_id'  => $request->course_id,
        ] );

        return redirect()->route( 'review.index' )->with( 'success', 'Review Created Successfull' );
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
    public function edit( Request $request, Review $review ) {
        return view( 'backend.review.edit' )->with( [
            'review'  => $review,
            'courses' => Course::get(),
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Review $review ) {
        $request->validate( [
            'star'      => 'required|numeric|max:5',
            'content'   => 'required',
            'course_id' => 'required',
        ] );

        $review->update( [
            'star'       => $request->star,
            'content'    => $request->content,
            'student_id' => Auth::id(),
            'course_id'  => $request->course_id,
        ] );

        return redirect()->route( 'review.index' )->with( 'success', 'Review Updated Successfull' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Review $review ) {
        $review->delete();

        return redirect()->route('review.index')->with('success', 'Review Has Been Deleted!');
    }
}
