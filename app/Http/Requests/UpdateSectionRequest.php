<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
//
use Illuminate\Validation\Rule;

class UpdateSectionRequest extends FormRequest
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
        // Get the ID from the route parameter
        // If $this->route('section') returns an object, we take the id.
        $section = $this->route('section');
        $sectionId = is_object($section) ? $section->id : $section;
        return [
            'section_name' => [
                'required',
                'max:50',
                Rule::unique('sections', 'section_name')->ignore($sectionId),
            ],
        ];
    }
}
