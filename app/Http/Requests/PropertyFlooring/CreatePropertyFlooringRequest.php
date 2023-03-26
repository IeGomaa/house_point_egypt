<?php

namespace App\Http\Requests\PropertyFlooring;

use App\Models\PropertyFlooring;
use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyFlooringRequest extends FormRequest
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
        return PropertyFlooring::createRule();
    }
}
