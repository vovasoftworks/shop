<?php

namespace App\Repositories\Read\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductReadRepository implements ProductReadRepositoryInterface
{
    private function query(): Builder
    {
        return Product::query();
    }

    public function getById(int $id)
    {
        return $this->query()
            ->findOrFail($id);
    }
}
