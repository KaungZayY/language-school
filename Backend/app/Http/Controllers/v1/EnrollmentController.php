<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyCourseRequest;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function enroll(ApplyCourseRequest $request, $id)
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
            $user = Auth::guard('sanctum')->user();
            $enrollment = Enrollment::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'full_name' => $data['full_name'],
                'passport_no' => $data['passport_no'],
                'nationality' => $data['nationality'],
                'address' => $data['address'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Application submitted successfully!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
