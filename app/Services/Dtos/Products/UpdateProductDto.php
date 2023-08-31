<?php

namespace App\Services\Dtos\Products;

use App\Http\Requests\Products\UpdateProductRequest;

class UpdateProductDto
{
    public int $productId;
    public int $userId;
    public BaseProductDto $productDto;

    public static function fromRequest(UpdateProductRequest $request): self
    {
        $dto = new self();

        $dto->productDto = BaseProductDto::fromRequest($request);
        $dto->productId = $request->getProductId();
        $dto->userId = $request->getUserId();

        return $dto;
    }
}
