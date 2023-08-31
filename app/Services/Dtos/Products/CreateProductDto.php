<?php

namespace App\Services\Dtos\Products;

use App\Http\Requests\Products\CreateProductRequest;

class CreateProductDto
{
    public int $categoryId;
    public BaseProductDto $productDto;

    public static function fromRequest(CreateProductRequest $request): self
    {
        $dto = new self();

        $dto->productDto = BaseProductDto::fromRequest($request);
        $dto->categoryId = $request->getCategoryId();

        return $dto;
    }
}
