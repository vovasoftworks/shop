<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Services\Dtos\Products\UpdateProductDto;
use App\Services\Dtos\Products\CreateProductDto;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $owner_id
 * @property int $category_id
 * @property string $name
 * @property string $price
 * @property string $picture
 * @property string $about
 * @property bool $exists
 */

class Product extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'owner_id',
        'category_id',
        'name',
        'price',
        'picture',
        'about',
        'exists',
    ];

    protected $casts = [
        'owner_id' => 'integer',
        'category_id' => 'integer',
        'name' => 'string',
        'price' => 'string',
        'picture' => 'string',
        'about' => 'string',
        'exists' => 'boolean',
    ];

    public static function createModel(CreateProductDto $dto): Product
    {
        $newProduct = new self();

        $newProduct->setName($dto->productDto->name)
            ->setOwnerId($dto->productDto->ownerId)
            ->setCategoryId($dto->productDto->categoryId)
            ->setPrice($dto->productDto->price)
            ->setPicture($dto->productDto->picture)
            ->setAbout($dto->productDto->about)
            ->setExists($dto->productDto->exists);

        return $newProduct;
    }

    public function updateModel(UpdateProductDto $dto): self
    {
        $this->setName($dto->productDto->name)
            ->setOwnerId($dto->productDto->ownerId)
            ->setCategoryId($dto->productDto->categoryId)
            ->setPrice($dto->productDto->price)
            ->setPicture($dto->productDto->picture)
            ->setAbout($dto->productDto->about)
            ->setExists($dto->productDto->exists);

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setOwnerId(int $ownerId): self
    {
        $this->owner_id = $ownerId;

        return $this;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->category_id = $categoryId;

        return $this;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function setPicture(?UploadedFile $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function setExists(?bool $exists): self
    {
        $this->exists = $exists;

        return $this;
    }

    public function users(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function categories(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
