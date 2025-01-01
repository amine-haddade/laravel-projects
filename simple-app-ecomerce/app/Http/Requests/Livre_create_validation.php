<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Livre_create_validation extends FormRequest
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
            'image_livre'=>['required','max:1000000'],
            'titre_livre'=>['min:5','required'],
            'prix_livre'=>['required'],
            'pdf'=>['required','file'],
            'description'=>['required','min:10']
        ];
    }
}
