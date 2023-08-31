<?php

namespace App\Services\Dtos\Categories;

use App\Http\Requests\Categories\CreateCategoryRequest;

class CreateCategoryDto
{
    public string $name;
    public ?int $parentId;

    public static function fromRequest(CreateCategoryRequest $request): self
    {
        $entity = new self();

        $entity->setName($request->getCategoryName());
        $entity->setParentId($request->getParentId());

        return $entity;
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setParentId(?int $name): void
    {
        $this->parentId = $name;
    }
}
