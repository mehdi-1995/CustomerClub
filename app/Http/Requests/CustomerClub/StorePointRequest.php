<?php

namespace App\Http\Requests\CustomerClub;

use Illuminate\Foundation\Http\FormRequest;

class StorePointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'activity_type_id' => 'required|exists:activity_types,id',
            'amount' => 'sometimes|integer|min:1',
            'notes' => 'nullable|string|max:500'
        ];
    }
}
