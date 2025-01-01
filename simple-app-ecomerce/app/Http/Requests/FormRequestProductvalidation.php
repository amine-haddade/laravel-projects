<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProductvalidation extends FormRequest
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
            'name'=>['min:3','required'],
            'prix'=>['min:0','required','numeric','regex:/^-?\d{1,4}(\.\d{2})?$/'],
            'image'=>['required','max:100000','file'],
            'categorie_id'=>['required','exists:categories,id'],

        ];
    }
}
