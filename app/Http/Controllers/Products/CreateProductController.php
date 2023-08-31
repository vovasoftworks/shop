<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Dtos\Products\CreateProductDto;
use App\Http\Requests\Products\CreateProductRequest;
use App\Services\Actions\Products\CreateProductAction;

class CreateProductController extends Controller
{
    public function __invoke(
        CreateProductRequest $request, CreateProductAction $createProductAction
    ): JsonResponse {
        $dto = CreateProductDto::fromRequest($request);

        $createProductAction->run($dto);

        return response()->json("Product created successfully");
    }
}
