<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'keywords' => 'string|nullable',
            'logo' => 'image|nullable',
            'favicon' => 'image|nullable',
            'status' => 'string|nullable',
            'maintenance' => 'string|nullable',
            'facebook' => 'string|nullable',
            'twitter' => 'string|nullable',
            'instagram' => 'string|nullable',
            'youtube' => 'string|nullable',
            'github' => 'string|nullable',
            'whatsapp' => 'string|nullable',
            'email' => 'email|nullable',
            'phone' => 'string|nullable',
            'language' => 'string|nullable',
        ];
    }
}
