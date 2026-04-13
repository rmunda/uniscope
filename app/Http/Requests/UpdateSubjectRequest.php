<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
//
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Capture the ID from the URL (e.g., /subjects/5)
        $subjectId = $this->route('subject'); 

        return [
           'subject_name' => [
                'required', 
                'max:50', 
                // Laravel handles $this->route('subject') whether it's an ID or an Object
                Rule::unique('subjects')->ignore($this->route('subject'))
            ],
        ];
    }
}
