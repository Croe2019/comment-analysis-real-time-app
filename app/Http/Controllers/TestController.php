<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YoutubeService;

class TestController extends Controller
{
    public function test()
    {
        $url = 'https://www.youtube.com/watch?v=XXXXX'; // ライブ配信URLにする

        $youtubeService = new YoutubeService();

        $videoId = $youtubeService->extractVideoId($url);
        $chatId = $youtubeService->getLiveChatId($videoId);

        return response()->json([
            'videoId' => $videoId,
            'liveChatId' => $chatId,
        ]);
    }
}
