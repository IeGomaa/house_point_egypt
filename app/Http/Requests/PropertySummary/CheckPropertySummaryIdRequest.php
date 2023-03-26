<?php

namespace App\Http\Requests\PropertySummary;

use Illuminate\Foundation\Http\FormRequest;

class CheckPropertySummaryIdRequest extends FormRequest
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
            'id' => 'required|integer|exists:property_summaries,id'
        ];
    }
}
