<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Laravel\Facades\Image;

class UpdateCompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        $companyId = $this->route('company');

        return [
            //
            'name' => [
                'required',
                'min:3',
                Rule::unique('companies', 'name')->ignore($companyId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('companies', 'email')->ignore($companyId),
            ],
            'website' => [
                'required',
                'url',
                Rule::unique('companies', 'website')->ignore($companyId),
            ],
            'logo' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048', function($attribute, $value, $fail) {
                
                if ($value) {
                    $image = Image::read($value);
                    $width = $image->width();
                    $height = $image->height();
                    if ($width < 100 || $height < 100) {
                        $fail('The ' . $attribute . ' must be at least 100x100 pixels.');
                    }
                }
            }]
        ];
    }
}
