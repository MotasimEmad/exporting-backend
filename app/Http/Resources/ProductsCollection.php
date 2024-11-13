<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ProductImage;

class ProductsCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'images' => ProductImagesCollection::collection(ProductImage::where('product_id', $this->id)->get()),
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at
        ];
    }
}
