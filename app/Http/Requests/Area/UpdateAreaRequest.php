<?php

namespace App\Http\Requests\Area;

use App\Models\Area;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
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
        return array_merge(Area::createRule(), [
            'id' => 'required|integer|exists:areas,id'
        ]);
    }
}
