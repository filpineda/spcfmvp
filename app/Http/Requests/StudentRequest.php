<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            // 'name' => 'required|min:5|max:255'
            'student_number' => [
                'required',
                Rule::unique('students', 'name')->ignore($this->route()->student)
            ],
            'first_name' => 'required|min:5|max:30',
            'middle_name' => 'required|min:5|max:30',
            'last_name' => 'required|min:5|max:30',
            'admission_year' => 'required|date',
            'religion' => 'required',
            'address1' => 'required|min:5|max:255',
            'address2' => 'required|min:5|max:255',
            'municipality' => 'required|min:5|max:255',
            'province' => 'required|min:5|max:255',
            'date_of_birth' => 'required|date',
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
