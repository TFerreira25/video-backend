<?php

namespace App\Http\Controllers;

use App\Http\Services\VideoService;
use Illuminate\Http\Request;

class Controller
{
    public function getVideos(Request $request)
    {
        $videoService = new VideoService();

        $size = $request->query('size');
        $locale = $request->query('locale');
        $page = $request->query('page', 1);
        $perPage = $request->query('per_page', 16);
        return $videoService->index($size, $locale, $page, $perPage);
    }

    public function getVideoById(Request $request, $id)
    {
        $videoService = new VideoService();
        return $videoService->show($id);
    }
}
