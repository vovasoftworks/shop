<?php

namespace App\Http\Requests\Products;

class CreateProductRequest extends BaseProductRequest
{
    protected const CATEGORY_ID = 'category_id';

    public function rules(): array
    {
        return [
            self::CATEGORY_ID => [
                'required',
                'int'
            ],
        ];
    }

    public function getCategoryId(): int
    {
        return $this->get(self::CATEGORY_ID);
    }
}
