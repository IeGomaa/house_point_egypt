<?php

namespace App\Http\Requests\PropertyFlooring;

use App\Models\PropertyFlooring;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyFlooringRequest extends FormRequest
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
        return array_merge(PropertyFlooring::createRule(), [
            'id' => 'required|integer|exists:property_flooring,id'
        ]);
    }
}
