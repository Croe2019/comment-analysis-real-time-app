<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YoutubeService;

class TestController extends Controller
{
    public function youtube()
    {
        $url = 'https://www.youtube.com/watch?v=W0hpBFmA2t4'; // ライブ配信URLにする

        $youtubeService = new YoutubeService();

        $videoId = $youtubeService->extractVideoId($url);
        $chatId = $youtubeService->getLiveChatId($videoId);

        return response()->json([
            'videoId' => $videoId,
            'liveChatId' => $chatId,
        ]);
    }
}
