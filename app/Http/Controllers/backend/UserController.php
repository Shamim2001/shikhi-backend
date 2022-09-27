<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.user.index' )->with( 'users', User::orderBy( 'name', 'ASC' )->paginate( 5 ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.user.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        // dd($request->all());
        $request->validate( [
            'name'      => 'required|max:100',
            'username'  => 'required|max:100|unique:users',
            'email'     => 'required|max:100|email',
            'password'  => 'required|max:100',
            'phone'     => 'required|max:20',
            'thumbnail' => 'required',
        ] );

        $thumb = '';
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            $thumb = time() . '-' . $request->file( 'thumbnail' )->getClientOriginalName();
            $thumb = str_replace( ' ', '-', $thumb );

            $request->file( 'thumbnail' )->storeAs( 'public/uploads/courses', $thumb );
        }

        User::create( [
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => $request->password,
            'phone'     => $request->phone,
            'thumbnail' => $thumb,
        ] );

        return redirect()->route( 'user.index' )->with( 'success', 'User Created Successfull' );
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
    public function edit( User $user ) {
        return view( 'backend.user.edit' )->with( 'user', $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, User $user ) {
        $request->validate( [
            'name'      => 'required|max:100',
            'username'  => 'required|max:100|unique:users,username,'.$user->id,
            'email'     => 'required|max:100|email',
            'password'  => 'nullable',
            'phone'     => 'required|max:20',
            'thumbnail' => 'required',
        ] );

        // get default thumbnail
        $thumb = $user->thumbnail;
        // update new thumbnail
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            Storage::delete( 'public/uploads/courses' . $thumb ); // delete the old image
            $filename = strtolower( str_replace( ' ', '-', $request->file( 'thumbnail' )->getClientOriginalName() ) );
            $thumb = time() . '-' . $filename;
            $request->file( 'thumbnail' )->storeAs( 'public/uploads/courses', $thumb );
        }

        $user->update( [
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => $request->password,
            'phone'     => $request->phone,
            'thumbnail' => $thumb,
        ] );

        return redirect()->route( 'user.index' )->with( 'success', 'User Updated Successfull' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user ) {

        $thumb = pathinfo( $user->thumbnail );
        $image_ext = $thumb['basename'];
        Storage::delete( 'public/uploads/courses/' . $image_ext );

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User Has Been Deleted!');
    }
}
