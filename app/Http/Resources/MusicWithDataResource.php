<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicWithDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Title' => $this->Title,
            'Link' => $this->Link,
            'Category' => new CategoryResource($this->category),
            'Artist' => new ArtistResource($this->artist)
        ];
    }
}
