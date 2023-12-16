<?php

namespace App\Http\Requests\Kanban;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CardsReorderRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'columns' => ['nullable', 'array'],
            'columns.*.id' => ['integer', 'required', 'exists:\App\Models\Kanban\Column,id'],
            'columns.*.cards' => ['nullable', 'array'],
            'columns.*.cards.*.id' => ['nullable', 'integer', 'required_with:columns.*.cards', 'exists:\App\Models\Kanban\Card,id'],
            'columns.*.cards.*.position' => ['nullable', 'required_with:columns.*.cards', 'numeric'],
        ];
    }
}
