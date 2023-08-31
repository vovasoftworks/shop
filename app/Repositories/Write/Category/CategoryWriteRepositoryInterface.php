<?php

namespace App\Repositories\Write\Category;

use App\Services\Dtos\Categories\CreateCategoryDto;

interface CategoryWriteRepositoryInterface
{
    public function create(CreateCategoryDto $dto): bool;

    public function delete(int $categoryId): bool;
}
