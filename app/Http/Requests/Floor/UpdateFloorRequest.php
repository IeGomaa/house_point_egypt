<?php

namespace App\Http\Requests\Floor;

use App\Models\FlooringNum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFloorRequest extends FormRequest
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
        return array_merge(FlooringNum::createRule(), [
            'id' => 'required|integer|exists:flooring_nums,id'
        ]);
    }
}
