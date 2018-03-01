<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('templates', 'name')->ignore($this->route()->template),
            ],
            'course_id' => [
                'required',
                Rule::exists('courses', 'id'),
            ],
            'academic_year_id' => [
                'required',
                Rule::exists('academic_years', 'id'),
            ],
            'semester_applicable' => [
                'required',
                Rule::in(['1st SEMESTER', '2nd SEMESTER']),
            ],
            'due_at' => [
                'required',
                'date',
            ],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
