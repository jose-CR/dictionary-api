<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BulkWordRequest extends FormRequest
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
        return [
            '*.subCategoryId' => ['nullable', 'exists:sub_categories,id'],
            '*.letter' => ['required', 'string', 'min:1', 'max:255'],
            '*.word' => ['required', 'string', 'min:1', 'max:255'],
            '*.definition' => ['required', 'json'],
            '*.spanishSentence' => ['required', 'string', 'min:1', 'max:255'],
            '*.sentence' => ['required', 'string', 'min:1', 'max:255'],
            '*.times' => ['nullable', 'array'],
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $obj) 
        {
            $obj['sub_category_id'] = $obj['subCategoryId'] ?? null;
            $obj['spanish_sentence'] = $obj['spanishSentence'] ?? null;
            if( is_array($obj['definition'])) {
                $obj['definition'] = json_encode($obj['definition']); 
            }
            $data[] = $obj;
        }
        $this->merge($data);
    }
}
