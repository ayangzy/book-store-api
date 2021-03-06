<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ViewBooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'price' => $this->price,
            'photo' => $this->photo,
            'average_rating' => $this->ratings->avg('rating')
        ];
    }
}
