<?php

namespace App\Services\Actions\Products;

use App\Repositories\Read\Product\ProductReadRepositoryInterface;

class GetProductAction
{
    protected ProductReadRepositoryInterface $productReadRepository;

    public function __construct(ProductReadRepositoryInterface $productReadRepository)
    {
        $this->productReadRepository = $productReadRepository;
    }

    public function run(int $productId)
    {
        return $this->productReadRepository->getById($productId);
    }

}
