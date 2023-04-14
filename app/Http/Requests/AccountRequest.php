<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|min:2',
            'last_name' => 'nullable|min:2',
            'birthday' => 'nullable|date',
            'sex' => 'nullable|min:2',
            'phone' => 'nullable|min:7',
        ];
    }
}
