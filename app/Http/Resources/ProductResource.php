<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'owner_id' => $this->resource->owner_id,
            'category_id' => $this->resource->category_id,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'picture' => $this->resource->picture,
            'about' => $this->resource->about,
            'exists' => $this->resource->exists,

            'created_at' => $this->resource->created_at ? $this->resource->created_at->format("Y-m-d H:i:s") : null,
            'updated_at' => $this->resource->updated_at ? $this->resource->updated_at->format("Y-m-d H:i:s") : null,
        ];
    }
}
