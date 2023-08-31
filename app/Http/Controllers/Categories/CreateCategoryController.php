<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Dtos\Categories\CreateCategoryDto;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Services\Actions\Categories\CreateCategoryAction;

class CreateCategoryController extends Controller
{
    public function __invoke(
        CreateCategoryRequest $request, CreateCategoryAction $createCategoryAction
    ): JsonResponse {
        $dto = CreateCategoryDto::fromRequest($request);

        $createCategoryAction->run($dto);

        return response()->json("Category created successfully");
    }
}
