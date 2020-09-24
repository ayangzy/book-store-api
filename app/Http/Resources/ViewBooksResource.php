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
            'description' => $this->description,
            'price' => $this->price,
            'created_by' => $this->user->name,
            'date_created' => $this->created_at->diffForHumans(),
            'photo' => $this->photo,
        ];
    }
}
