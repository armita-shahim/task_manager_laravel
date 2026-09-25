<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Priority;
use App\Enums\Status;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'priority' => ['required', new Enum(Priority::class)],
            'due_date' => ['required', 'date', 'after_or_equal:today'],
            'status' => ['required', new Enum(Status::class)],
            'category_id' => ['nullable', 'exists:categories,id']
        ];
    }
}
