<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'width' => $this['width'],
            'height' => $this['height'],
            'duration' => $this['duration'],
            'user_name' => $this['user']['name'] ?? null,
            'video_files' => $this['video_files'],
            'video_pictures' => $this['video_pictures'],
        ];
    }
}
