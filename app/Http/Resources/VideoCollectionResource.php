<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoCollectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'items' => collect($this['videos'])->map(fn($video) => new VideoResource($video)),
            'page' => $this['page'],
            'per_page' => $this['per_page'],
            'total_pages' => ceil($this['total_results'] / $this['per_page']),
        ];
    }
}
