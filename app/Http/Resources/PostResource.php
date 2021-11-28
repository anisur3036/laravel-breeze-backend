<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'uuid' => $this->uuid,
            'slug' => $this->slug,
            'body' => $this->body,
            'teaser' => $this->teaser,
            'published' => $this->published,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
