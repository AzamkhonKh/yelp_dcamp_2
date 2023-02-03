<?php

namespace App\Http\Requests\organisation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'legal_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'source' => ['required', 'string', 'max:255'],
            'inn' => ['required', 'numeric'],
            'phone_number' => ['string', 'max:20'], // +(998) 99 999 99 99
            'head_person_name' => ['string', 'max:255'],
        ];
    }
}
