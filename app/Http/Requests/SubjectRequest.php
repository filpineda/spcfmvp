<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
                Rule::unique('subjects', 'name')->ignore($this->route()->subject),
            ],
            'description' => [
                'required',
                'min:5',
                'max:255',
            ],
            'code' => [
                'required',
                'min:5',
                'max:15',
                Rule::unique('subjects', 'code')->ignore($this->route()->subject),
            ],
            'academic_year_id' => [
                'required',
                'exists:academic_years,id'
            ],
            'semester_applicable' => [
                'required',
                Rule::in(['1st SEMESTER', '2nd SEMESTER']),
            ],
            'course_id' => [
                'required',
                'exists:courses,id'
            ],
            'units' => [
                'required',
                'numeric',
                'regex:/^[1-9]+(\.50|\.00)?$/',
            ],
            'price_per_unit' => [
                'required',
                'numeric',
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
