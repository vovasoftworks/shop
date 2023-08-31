<?php

namespace App\Services\Actions\Categories;

use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Services\Dtos\Categories\CreateCategoryDto;

class CreateCategoryAction
{
    protected CategoryWriteRepositoryInterface $categoryWriteRepository;

    public function __construct(CategoryWriteRepositoryInterface $categoryWriteRepository)
    {
        $this->categoryWriteRepository = $categoryWriteRepository;
    }

    public function run(CreateCategoryDto $dto)
    {
        $this->categoryWriteRepository->create($dto);
    }

}
