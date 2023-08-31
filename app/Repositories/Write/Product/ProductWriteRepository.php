<?php

namespace App\Repositories\Write\Product;

use App\Models\Product;
use App\Exceptions\SavingErrorException;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Dtos\Products\CreateProductDto;
use App\Services\Dtos\Products\UpdateProductDto;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Product::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function create(CreateProductDto $dto): bool
    {
        $product = Product::createModel($dto);

        return $this->save($product);
    }

    /**
     * @throws SavingErrorException
     */
    public function update(UpdateProductDto $dto): bool
    {
        $product = $this->getById($dto->productId);
        $product->update([
            'name' => $dto->productDto->name,
            'owner_id' => $dto->productDto->ownerId,
            'category_id' => $dto->productDto->categoryId,
            'price' => $dto->productDto->price,
            'picture' => $dto->productDto->picture,
            'about' => $dto->productDto->about,
            'exists' => $dto->productDto->exists,
        ]);

        return $this->save($product);
    }

    public function delete(int $userId, int $productId): bool
    {
        return $this->query()
            ->where('id', $productId)
            ->where('owner_id', $userId)
            ->delete();
    }

    /**
     * @throws SavingErrorException
     */
    private function save(Product $product): bool
    {
        if (!$product->save()) {
            throw new SavingErrorException();
        }

        return true;
    }

    private function getById(int $id): Product
    {
        $query = $this->query();

        return $query->findOrFail($id);
    }
}
