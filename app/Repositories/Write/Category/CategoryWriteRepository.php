<?php

namespace App\Repositories\Write\Category;

use App\Models\Category;
use App\Exceptions\SavingErrorException;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Dtos\Categories\CreateCategoryDto;

class CategoryWriteRepository implements CategoryWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Category::query();
    }

    /**
     * @throws SavingErrorException
     */
    public function create(CreateCategoryDto $dto): bool
    {
        $category = Category::createModel($dto);

        return $this->save($category);
    }

    public function delete(int $categoryId): bool
    {
        return $this->query()
            ->where('id', $categoryId)
            ->delete();
    }

    /**
     * @throws SavingErrorException
     */
    private function save(Category $category): bool
    {
        if (!$category->save()) {
            throw new SavingErrorException();
        }

        return true;
    }
}
