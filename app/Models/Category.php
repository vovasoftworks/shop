<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Services\Dtos\Categories\CreateCategoryDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $name
 * @property int $parent_id
 */

class Category extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'id',
        'name',
        'parent_id',
    ];

    protected $casts = [
        'name' => 'string',
        'parent_id' => 'integer',
    ];

    public static function createModel(CreateCategoryDto $dto): Category
    {
        $newCategory = new self();

        $newCategory->setName($dto->name);
        $newCategory->setParentId($dto->parentId);

        return $newCategory;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setParentId(?int $parentId): void
    {
        $this->parent_id = $parentId;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
