<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function login( Request $request ) {
        $request->validate( [
            'email'    => 'required|email|string',
            'password' => 'required',
        ] );

        try {
            if ( !Auth::attempt( $request->only( 'email', 'password' ) ) ) {
                return [
                    'error'   => true,
                    'message' => 'User not found!',
                ];
            }

            /** @var User $user */
            $user = Auth()->user();

            $token = $user->createToken( 'token' )->plainTextToken;

            return [
                'error'   => false,
                'message' => 'login successfull',
                'user'    => auth()->user(),
                'token'   => $token,
            ];
        } catch ( \Throwable$th ) {
            return [
                'error'   => true,
                'message' => $th->getMessage(),
            ];
        }
    }
}
