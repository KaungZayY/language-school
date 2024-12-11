<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index()
    {
        try {
            $courses = Course::with('course_type')->get();
            return response()->json([
                'status' => 'success',
                'courses' => $courses,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreCourseRequest $request)
    {
        Gate::authorize('modify');
        try {
            $data = $request->validated();
            $course = Course::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'levels' => $data['levels'],
                'schedule' => $data['schedule'],
                'max_class_size' => $data['max_class_size'],
                'avg_class_size' => $data['avg_class_size'],
                'duration' => $data['duration'],
                'start_date' => $data['start_date'],
                'course_type_id' => $data['course_type_id'],
                'created_date' => now(),
            ]);

            if (!$course) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'An excepted error occured!',
                ], 500);
            }

            return response()->json([
                'status' => 'success',
                'course' => $course,
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $course = Course::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'course' => $course,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Course Not Found!',
                'status' => 404,
            ],404);
        }
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        try {
            $course = Course::find($id);
            if (!$course) {
                return response()->json([
                    'message' => 'Course not found',
                    'status' => 404,
                ], 404);
            }
            $data = $request->validated();
            $course->update($data);
            return response()->json([
                'status' => 'success',
                'course' => $course,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $course = Course::find($id);
            if(!$course){
                return response()->json([
                    'message' => 'Course not found',
                    'status' => 404,
                ], 404);
            }
            $course->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Course deleted successfully!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,
            ],500);
        }
    }
}
