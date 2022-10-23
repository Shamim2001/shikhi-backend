<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function courses()
    {
        return [
            'error' => 'false',
            'courses' => Course::get(),
        ];
    }

    // Single Course view
    public function courseSingle($slug)
    {
       $course = Course::where('slug', $slug)->get()->first();
        return [
            'error' => false,
            'course' => $course,
        ];
    }

}
