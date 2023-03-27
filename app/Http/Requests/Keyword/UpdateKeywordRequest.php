<?php

namespace App\Http\Requests\Keyword;

use App\Models\Keyword;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKeywordRequest extends FormRequest
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
        return array_merge(Keyword::createRule(), [
            'id' => 'required|integer|exists:keywords,id'
        ]);
    }
}
