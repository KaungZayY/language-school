<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'levels' => 'required|string',
            'schedule' => 'required|string',
            'max_class_size' => 'required|integer',
            'avg_class_size' => 'required|integer',
            'duration' => 'required|string',
            'start_date' => 'required|string',
            'course_type_id' => 'required|exists:course_types,id',
        ];
    }
}
