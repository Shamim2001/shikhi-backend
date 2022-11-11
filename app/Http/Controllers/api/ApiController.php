<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller {
    public function courses() {
        return [
            'error'   => 'false',
            'courses' => Course::get(),
        ];
    }

    // Single Course view
    public function courseSingle( $slug ) {
        $course = Course::where( 'slug', $slug )->get()->first();
        return [
            'error'  => false,
            'course' => $course,
        ];
    }

    // Course Enroll APi
    // public function enrollCourse() {
    //     return [
    //         'error'   => false,
    //         'message' => 'login successfull',
    //     ];
    // }

    public function enrollCourse( $slug ) {
        $course = Course::where( 'slug', $slug )->first();
        $result = $course->student()->sync( [auth()->user()->id] );

        if($result) {
            if ( $result['attached'] != [] ) {
            return [
                'success' => true,
                'message' => 'Successfully enrolled !',
            ];
        } else {
            return [
                'success' => true,
                'message' => 'Already enrolled !',
            ] ;
        }
        } else {
            return  [
                'success' => true,
                'message' => 'Something went wrong !',
            ];
        }
    }

}
