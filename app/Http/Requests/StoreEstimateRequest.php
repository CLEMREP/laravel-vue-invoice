<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstimateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'estimateDate' => ['required', 'date_format:Y-m-d'],
            'estimateDueDate' => ['required', 'date_format:Y-m-d'],
            'estimateId' => ['required', 'string'],
            'client' => ['required', 'integer'],
            'discountRate' => ['required', 'integer', 'min:0', 'max:100'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'items.*.price' => ['required', 'numeric', 'min:0'],
            'items.*.name' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }
}
