<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
//
use Illuminate\Validation\Rule;
use App\Models\Admin\AcademicClass;
use App\Models\Admin\Section;

class AssignSectionRequest extends FormRequest
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
        return [
            'class_id' => [
                'required',
                Rule::exists(AcademicClass::class, 'id'), // ✅ no hardcoding
            ],
            'section_id' => [
                'required',
                Rule::exists(Section::class, 'id'),
                Rule::unique('class_sections')
                    ->where(fn ($q) => $q->where('class_id', $this->class_id)),
            ],
        ];
    }
}
