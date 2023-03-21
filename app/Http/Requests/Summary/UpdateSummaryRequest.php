<?php

namespace App\Http\Requests\Summary;

use App\Models\Summary;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSummaryRequest extends FormRequest
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
        return array_merge(Summary::createRule(), [
            'id' => 'required|integer|exists:summaries,id'
        ]);
    }
}
