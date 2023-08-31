<?php

namespace App\Services\Actions\Categories;

use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;

class DeleteCategoryAction
{
    protected CategoryWriteRepositoryInterface $categoryWriteRepository;

    public function __construct(CategoryWriteRepositoryInterface $categoryWriteRepository)
    {
        $this->categoryWriteRepository = $categoryWriteRepository;
    }

    public function run(int $categoryId): void
    {
        $this->categoryWriteRepository->delete($categoryId);
    }
}
