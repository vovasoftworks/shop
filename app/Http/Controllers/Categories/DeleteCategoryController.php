<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Actions\Categories\DeleteCategoryAction;

class DeleteCategoryController extends Controller
{
    public function __invoke(
        int $categoryId, DeleteCategoryAction $deleteCategoryAction
    ): JsonResponse {
        $deleteCategoryAction->run($categoryId);

        return response()->json("Category deleted successfully");
    }
}
