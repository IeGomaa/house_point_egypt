<?php

namespace App\Http\Requests\PropertyImage;

use App\Models\PropertyFlooring;
use App\Models\PropertyImage;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyImageRequest extends FormRequest
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
            'id' => 'required|integer|exists:property_images,id',
            'property_id' => 'required|integer|exists:properties,id',
            'image' => 'required|image|mimes:png,jpg,webp,jpeg'
        ];
    }
}
