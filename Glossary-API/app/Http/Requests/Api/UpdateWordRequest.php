<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWordRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'subCategoryId' => ['nullable', 'exists:sub_categories,id'],
                'letter' => ['nullable', 'string', 'min:1', 'max:255'], 
                'word' => ['required', 'string', 'min:1', 'max:255'],
                'definition' => ['required', 'json'],
                'spanishSentence' => ['required', 'string', 'min:1', 'max:255'],
                'sentence' => ['required', 'string', 'min:1', 'max:255']
            ];
        }
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        if ($this->filled('definition') && is_array($this->definition)) {
            $this->merge([
                'definition' => json_encode($this->definition)
            ]);
        }

        if ($this->filled('subCategoryId')) {
            $this->merge([
                'sub_category_id' => $this->subCategoryId
            ]);
        }

        if ($this->filled('spanishSentence')) {
            $this->merge([
                'spanish_sentence' => $this->spanishSentence
            ]);
        }
    }
}
