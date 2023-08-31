<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\Actions\Products\DeleteProductAction;

class DeleteProductController extends Controller
{
    public function __invoke(
        Request $request, int $productId, DeleteProductAction $deleteProductAction
    ): JsonResource {
        $deleteProductAction->run($request->user()->id, $productId);

        return new JsonResource([
            'message' => "Product deleted successfully",
        ]);
    }

}
