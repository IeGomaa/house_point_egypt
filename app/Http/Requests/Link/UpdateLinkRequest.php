<?php

namespace App\Http\Requests\Link;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
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
        return array_merge(Link::createRule(), [
            'id' => 'required|integer|exists:links,id'
        ]);
    }
}
