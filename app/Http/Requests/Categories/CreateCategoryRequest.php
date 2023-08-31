<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    private const NAME = 'name';
    private const PARENT_ID = 'parent_id';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string'
            ],
            self::PARENT_ID => [
                'int'
            ]
        ];
    }

    public function getCategoryName(): string
    {
        return $this->get(self::NAME);
    }

    public function getParentId(): ?int
    {
        return $this->get(self::PARENT_ID);
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }
}
