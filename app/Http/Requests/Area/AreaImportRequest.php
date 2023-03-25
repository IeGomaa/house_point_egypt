<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;

class AreaImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'area' => 'required|file|mimes:xlsx'
        ];
    }
}