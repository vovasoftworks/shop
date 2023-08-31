<?php

namespace App\Repositories\Read\Product;

interface ProductReadRepositoryInterface
{
    public function getById(int $id);
}
