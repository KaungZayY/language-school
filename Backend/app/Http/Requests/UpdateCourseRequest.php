<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'levels' => 'sometimes|required|string',
            'schedule' => 'sometimes|required|string',
            'max_class_size' => 'sometimes|required|integer',
            'avg_class_size' => 'sometimes|required|integer',
            'duration' => 'sometimes|required|string',
            'start_date' => 'sometimes|required|string',
            'course_type_id' => 'sometimes|required|exists:course_types,id',
        ];
    }
}
