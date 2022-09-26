<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return view( 'backend.course.create' )->with( [
            'categories' => Category::orderBy( 'name', 'ASC' )->get(),
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $request->validate( [
            'name'         => 'required|max:255|string',
            'description'  => 'required',
            'requirements' => 'required|string',
            'visibility'   => 'required|not_in:none',
            'audience'     => 'required',
            'category_id'  => 'required|not_in:none',
            'thumbnail'    => 'image|mimes:png,jpg,jpeg|max:2048',
        ] );

        $thumb = '';
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            $thumb = time() . '-' . $request->file( 'thumbnail' )->getClientOriginalName();
            $thumb = str_replace( ' ', '-', $thumb );

            $request->file( 'thumbnail' )->storeAs( 'public/uploads/courses', $thumb );
        }

        Course::create( [
            'name'         => $request->name,
            'slug'         => Str::slug( $request->name ),
            'requirements' => $request->requirements,
            'visibility'   => $request->visibility,
            'description'  => $request->description,
            'audience'     => $request->audience,
            'category_id'  => $request->category_id,
            'teacher_id'   => Auth::id(),
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
    public function edit( Course $course ) {
        return view( 'backend.course.edit' )->with( [
            'course'     => $course,
            'categories' => Category::orderBy( 'name', 'ASC' )->get(),
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Course $course ) {

        $request->validate( [
            'name'         => ['required', 'max:255', 'string'],
            'description'  => ['required'],
            'requirements' => ['required', 'string'],
            'visibility'   => ['required', 'not_in:none'],
            'audience'     => ['required'],
            'category_id'  => ['required', 'not_in:none'],
            'thumbnail'    => 'image|mimes:png,jpg,jpeg|max:2048',
        ] );



        // get default thumbnail
        $thumb = $course->thumbnail;
        // update new thumbnail
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            Storage::delete( 'public/uploads/courses' . $thumb ); // delete the old image
            $filename = strtolower( str_replace( ' ', '-', $request->file( 'thumbnail' )->getClientOriginalName() ) );
            $thumb = time() . '-' . $filename;
            $request->file( 'thumbnail' )->storeAs( 'public/uploads/courses', $thumb );
        }

        $course->update( [
            'name'         => $request->name,
            'slug'         => Str::slug( $request->name ),
            'requirements' => $request->requirements,
            'visibility'   => $request->visibility,
            'description'  => $request->description,
            'audience'     => $request->audience,
            'category_id'  => $request->category_id,
            'teacher_id'   => Auth::id(),
            'thumbnail'    => $thumb,
        ] );

        return redirect()->route( 'course.index' )->with( 'success', 'Courses Updated Succefully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Course $course ) {
        $course->delete();

        return redirect()->route( 'course.index' )->with( 'success', 'Courses Deleted Succesfull!' );
    }
}