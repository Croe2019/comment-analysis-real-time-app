<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class YoutubeService
{
    public function extractVideoId(string $url): ?string
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);

        return $query['v'] ?? null;
    }

    public function getLiveChatId(string $videoId): ?string
    {
        $apiKey = config('services.youtube.key');

        $response = Http::get('https://www.googleapis.com/youtube/v3/videos', [
            'part' => 'liveStreamingDetails',
            'id' => $videoId,
            'key' => $apiKey,
        ]);

        $data = $response->json();

        return $data['items'][0]['liveStreamingDetails']['activeLiveChatId'] ?? null;
    }
}
