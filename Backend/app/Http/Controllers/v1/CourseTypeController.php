<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\CourseType;

class CourseTypeController extends Controller
{
    public function index()
    {
        try {
            $course_types = CourseType::with('courses')->get();
            return response()->json([
                'status' => 'success',
                'course_types' => $course_types,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 500,
                'message' => 'An unexpected error occurred. Please try again later.',
            ],500);
        }
    }
}
