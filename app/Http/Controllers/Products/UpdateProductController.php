<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Services\Actions\Products\UpdateProductAction;
use App\Services\Dtos\Products\UpdateProductDto;

class UpdateProductController extends Controller
{
    public function __invoke(
        UpdateProductRequest $request, UpdateProductAction $updateProductAction
    ) {
        $dto = UpdateProductDto::fromRequest($request);

        $updateProductAction->run($dto);

        return response('', 204);
    }

}
