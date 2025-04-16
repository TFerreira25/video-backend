<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Http\Resources\VideoCollectionResource;
use App\Http\Resources\VideoResource;

class VideoService
{

    public function index($size = null, $locale = null, $page = 1, $per_page = 16) {
        $queryParams = [
            'query' => 'nature',
            'page' => $page,
            'per_page' => $per_page,
        ];

        if ($size) {
            $queryParams['size'] = $size;
        }

        if ($locale) {
            $queryParams['locale'] = $locale;
        }

        $response = Http::withHeaders([
            'Authorization' => env('PEXELS_API_KEY'),
        ])->get('https://api.pexels.com/videos/search', $queryParams);

        $data = $response->json();

        return (new VideoCollectionResource([
            'videos' => $data['videos'],
            'page' => $data['page'],
            'per_page' => $data['per_page'],
            'total_results' => $data['total_results'],
        ]));
    }

    public function show($id) {
        $response = Http::withHeaders([
            'Authorization' => env('PEXELS_API_KEY'),
        ])->get("https://api.pexels.com/videos/videos/{$id}");

        $data = $response->json();

        return new VideoResource($data);
    }
}
