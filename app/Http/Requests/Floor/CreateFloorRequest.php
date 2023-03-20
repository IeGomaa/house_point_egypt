<?php

namespace App\Http\Requests\Floor;

use App\Models\FlooringNum;
use Illuminate\Foundation\Http\FormRequest;

class CreateFloorRequest extends FormRequest
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
        return FlooringNum::createRule();
    }
}