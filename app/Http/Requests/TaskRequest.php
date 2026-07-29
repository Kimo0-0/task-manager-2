<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $requiredRule = $isUpdate ? 'sometimes' : 'required';

        return [
            'title' => [$requiredRule, 'string', 'min:3', 'max:255'],
            'description' => [$requiredRule, 'string'],
            'status' => [$requiredRule, Rule::in(['pending', 'in_progress', 'done'])],
            'due_date' => [$requiredRule, 'date', 'after:now'],
            'category_id' => [
                $requiredRule,
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('user_id', $this->user()->id);
                }),
            ],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }
}
