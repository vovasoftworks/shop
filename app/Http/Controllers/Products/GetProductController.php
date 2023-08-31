<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Actions\Products\GetProductAction;

class GetProductController extends Controller
{
    public function __invoke(
        int $productId, GetProductAction $getProductAction): ProductResource
    {
        $product = $getProductAction->run($productId);

        return new ProductResource($product);
    }
}
