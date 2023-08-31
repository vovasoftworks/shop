<?php

namespace App\Http\Requests\Products;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Http\FormRequest;

class BaseProductRequest extends FormRequest
{
    protected const CATEGORY_ID = 'category_id';
    protected const NAME = 'name';
    protected const PRICE = 'price';
    protected const IMAGE = 'image';
    protected const ABOUT = 'about';
    protected const EXISTS = 'exists';

    public function rules(): array
    {
        return [
            self::CATEGORY_ID => [
                'int'
            ],
            self::NAME => [
                'string'
            ],
            self::PRICE => [
                'string'
            ],
            self::IMAGE => [
                'mimes:jpg,jpeg,png,gif,pdf,txt',
                'max:1024',
            ],
            self::ABOUT => [
                'string'
            ],
        ];
    }

    public function getCategoryId(): ?int
    {
        return $this->get(self::CATEGORY_ID);
    }

    public function getProductName(): string
    {
        return $this->get(self::NAME);
    }

    public function getProductPrice(): ?string
    {
        return $this->get(self::PRICE);
    }

    public function getProductPicture(): ?UploadedFile
    {
        return $this->file(self::IMAGE);
    }

    public function getProductAbout(): ?string
    {
        return $this->get(self::ABOUT);
    }

    public function getOwnerId(): string
    {
        return $this->user()->id;
    }

    public function getExists(): ?bool
    {
        return $this->get(self::EXISTS);
    }
}
