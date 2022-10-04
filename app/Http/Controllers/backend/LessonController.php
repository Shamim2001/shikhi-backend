<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LessonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.lesson.index' )->with( [
            'lessons' => Lesson::orderBy( 'name', 'ASC' )->paginate( 7 ),
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.lesson.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name'       => 'required|max:255',
            'content'    => 'required',
            'visibility' => 'required|not_in:none',
        ] );

        Lesson::create( [
            'name'       => $request->name,
            'slug'       => Str::slug( $request->name ),
            'content'    => $request->content,
            'visibility' => $request->visibility,
            'course_id'  => Auth::id(),
        ] );

        return redirect()->route( 'lesson.index' )->with( 'success', 'Lesson Created Succeffull' );
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
    public function edit( Lesson $lesson ) {
        return view( 'backend.lesson.edit' )->with( [
            'lesson' => $lesson,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Lesson $lesson ) {
        $request->validate( [
            'name'       => 'required|max:255',
            'content'    => 'required',
            'visibility' => 'required|not_in:none',
        ] );

        $lesson->update( [
            'name'       => $request->name,
            'slug'       => Str::slug( $request->name ),
            'content'    => $request->content,
            'visibility' => $request->visibility,
            'course_id'  => Auth::id(),
        ] );

        return redirect()->route( 'lesson.index' )->with( 'success', 'Lesson Updated Succeffull' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Lesson $lesson ) {
        $lesson->delete();

        return redirect()->route('lesson.index')->with( 'success', 'Lesson has been Deleted!' );
    }
}
