<?php

namespace App\Services\Dtos\Products;

use Illuminate\Http\UploadedFile;
use App\Http\Requests\Products\BaseProductRequest;

class BaseProductDto
{
    public int $ownerId;
    public int $categoryId;
    public string $name;
    public ?string $price;
    public ?UploadedFile $picture;
    public ?string $about;
    public ?bool $exists;

    public static function fromRequest(BaseProductRequest $request): self
    {
        $entity = new self();

        $entity->setOwnerId($request->getOwnerId());
        $entity->setName($request->getProductName());
        $entity->setCategoryId($request->getCategoryId());
        $entity->setPrice($request->getProductPrice());
        $entity->setPicture($request->getProductPicture());
        $entity->setAbout($request->getProductAbout());
        $entity->setExists($request->getExists());

        return $entity;
    }

    protected function setOwnerId(?int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    protected function setName(?string $name): void
    {
        $this->name = $name;
    }

    protected function setCategoryId(?int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    protected function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    protected function setPicture(?UploadedFile $picture): void
    {
        $this->picture = $picture;
    }

    protected function setAbout(?string $about): void
    {
        $this->about = $about;
    }

    protected function setExists(?bool $exists): void
    {
        $this->exists = $exists;
    }
}
