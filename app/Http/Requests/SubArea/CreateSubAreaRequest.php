<?php

namespace App\Http\Requests\SubArea;

use App\Models\SubArea;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubAreaRequest extends FormRequest
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
        return SubArea::createRule();
    }
}
