<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'edit_title' => 'required',
            'edit_department_id' => 'required',
            'edit_description' => 'required',
        ];
    }
}
