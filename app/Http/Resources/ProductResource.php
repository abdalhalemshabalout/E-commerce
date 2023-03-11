<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'categoryId' => $this->category_id,            
            'name' => $this->name,            
            'img' => $this->img,            
            'size' => $this->size,            
            'description' => $this->description,            
            'price' => $this->price,            
            'quantity' => $this->quantity,            
        ];
    }
}
