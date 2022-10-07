<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function lessons()
    {
        return [
            'error' => false,
            'lessons' => Lesson::get(),
        ];
    }
}
