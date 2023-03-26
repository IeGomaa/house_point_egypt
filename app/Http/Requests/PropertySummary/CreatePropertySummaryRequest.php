<?php

namespace App\Http\Requests\PropertySummary;

use App\Models\PropertyFlooring;
use App\Models\PropertyGeneral;
use App\Models\PropertySummary;
use Illuminate\Foundation\Http\FormRequest;

class CreatePropertySummaryRequest extends FormRequest
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
        return PropertySummary::createRule();
    }
}
