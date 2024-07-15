<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
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
            'List_Classes.*.Name' => 'required',
            'List_Classes.*.Name_en' => 'required',
           
        ];
    }
    public function messages(): array
    {
    return [
        'Name.required' => trans('validation.required'),
        'Name_en.required' => trans('validation.required'),
     
    ];
    }
}
