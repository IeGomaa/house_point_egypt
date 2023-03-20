<?php

namespace App\Http\Requests\Flooring;

use App\Models\Flooring;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFlooringRequest extends FormRequest
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
            'id' => 'required|integer|exists:flooring,id',
            'floor' => 'required|string|max:255|unique:flooring,floor,' . request('id')
        ];
    }
}
