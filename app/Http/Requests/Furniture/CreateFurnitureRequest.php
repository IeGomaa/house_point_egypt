<?php

namespace App\Http\Requests\Furniture;

use App\Models\Furniture;
use Illuminate\Foundation\Http\FormRequest;

class CreateFurnitureRequest extends FormRequest
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
        return Furniture::createRule();
    }
}
