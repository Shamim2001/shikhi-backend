<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
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
    public function courseSingle($id)
    {
        $lesson = Lesson::where('course_id', $id)->get();
        return [
            'error' => false,
            'lesson' => $lesson,
        ];
    }
}
