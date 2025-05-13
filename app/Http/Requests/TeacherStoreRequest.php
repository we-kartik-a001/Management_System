<?php

namespace App\Http\Requests;

// Request
use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\Course;

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
            'name'=> ['required','string','max:255'],
            'courses_id' => ['required', 'integer','exists:' . Course::class . ',id'],
            'age'=>['required','integer','max:60'],
        ];
    }
}
