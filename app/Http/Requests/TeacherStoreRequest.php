<?php

namespace App\Http\Requests;

// Request
use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Course;
use App\Models\Subject;
// Validation
use Illuminate\Validation\Rule;

class TeacherStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'courses_id' => ['required', 'integer', 'exists:' . Course::class . ',id'],
            'subject_id' => ['required', 'array'],
            'subject_id.*' => ['exists:' . Subject::class . ',id'],
            'date_of_birth' => ['required', 'date', 'after_or_equal:1900-01-01', 'before_or_equal:2024-06-10'],
        ];
    }
}
