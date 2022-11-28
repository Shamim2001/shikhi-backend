<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\User;
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

    // Enroll Course
    public function enrollCourse( $slug ) {
        $course = Course::where( 'slug', $slug )->first();
        $result = $course->student()->sync( [auth()->user()->id] );

        if ( $result ) {
            if ( $result['attached'] != [] ) {
                return [
                    'success' => true,
                    'message' => 'Successfully enrolled !',
                ];
            } else {
                return [
                    'success' => true,
                    'message' => 'Already enrolled !',
                ];
            }
        } else {
            return [
                'success' => true,
                'message' => 'Something went wrong !',
            ];
        }
    }

    // Users
    public function users() {
        return [
            'error'   => 'false',
            'user' => Auth::user(),
        ];
    }

    // Lessons
    public function lessons( $slug ) {
        $lessons = Lesson::where( 'slug', $slug )->with('coursess')->get();
        return [
            'error'  => false,
            'lessons' => $lessons,
        ];
    }

    public function review() {
        return [
            'error' =>false,
            'review' => Review::with('coursereview', 'student')->get(),
        ];
    }



}
