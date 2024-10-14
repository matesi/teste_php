<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StorePatientsRequest extends FormRequest
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
            'file' => 'required|mimes:csv|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'O campo Selecione o arquivo é obrigatório',
            'file.mimes' => 'O arquivo deve ser do tipo CSV. Arquivo selecionado: ' . $this->file->getClientOriginalName(),
            'file.max' => 'O arquivo deve ter no máximo 2MB.',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if (!$this->validationRules()) {
                    return redirect('patients');
                }
            }
        ];
    }
}
