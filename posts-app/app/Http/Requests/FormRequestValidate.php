<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestValidate extends FormRequest
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

            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'user_id'=>['required','exists:users,id'],
            'image'=>['required','max:1000'],
            //
        ];


    }

    public function messages()
    {
        return [
            'title.required'=>'s-il vous plais taper title de votre post',
            'title.min'=>' title de  post doit etre dépasser 3 caractére',
        ];
    }
}
