<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsTickerService
{
    public function fetchHeadlines(): array
    {
        $url = 'https://news.google.com/rss/search?q='.
            urlencode('(site:guardian.co.tt OR site:trinidadexpress.com OR site:reuters.com OR site:theguardian.com) Trinidad');

        $response = Http::timeout(10)->get($url);

        if (!$response->successful()) {
            return [];
        }

        $xml = new \SimpleXMLElement($response->body());

        $headlines = [];

        foreach ($xml->channel->item as $item) {
            $headlines[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'source' => $this->extractSource((string) $item->title),
            ];
        }

        return $headlines;
    }

    private function extractSource(string $title): string
    {
        if (str_contains($title, ' - ')) {
            return trim(explode(' - ', $title)[1]);
        }

        return 'Google News';
    }
}
