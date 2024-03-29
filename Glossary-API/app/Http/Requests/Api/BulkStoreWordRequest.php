<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreWordRequest extends FormRequest
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
            '*.categoryId' => ['nullable', 'exists:categories,id'],
            '*.letter' => ['required', 'string', 'min:1', 'max:255'],
            '*.word' => ['required', 'string', 'min:1', 'max:255'],
            '*.definition' => ['required', 'string', 'min:1', 'max:255']
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $obj) 
        {
            $obj['category_id'] = $obj['categoryId'] ?? null;
            $data[] = $obj;
        }
        $this->merge($data);
    }
}
