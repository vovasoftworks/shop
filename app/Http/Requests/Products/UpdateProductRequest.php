<?php

namespace App\Http\Requests\Products;

class UpdateProductRequest extends BaseProductRequest
{
    private const PRODUCT_ID = 'id';

    public function getProductId(): int
    {
        return $this->route(self::PRODUCT_ID);
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }
}
