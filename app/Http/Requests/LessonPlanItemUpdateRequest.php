<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonPlanItemUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'lesson_plan_id' => ['required', 'integer'],
            'objective' => ['required', 'string'],
            'activity' => ['required', 'string'],
            'resources' => ['required', 'string'],
            'assessment' => ['required', 'string'],
        ];
    }
}
