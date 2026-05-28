<?php

namespace TomShaw\GoogleApi\Resources;

use Google\Service\Exception;
use Google\Service\YouTube as YouTubeApi;
use TomShaw\GoogleApi\GoogleClient;

final class Youtube
{
    protected YouTubeApi $service;

    public function __construct(protected GoogleClient $client)
    {
        $googleApiClient = $client();
        if ($googleApiClient) {
            $this->service = new YouTubeApi($googleApiClient);
        }
    }

    /**
     * @throws Exception
     */
    public function listVideos(array $parts, array $ids = [])
    {
        return $this->service->videos->listVideos(
            implode(',', $parts),
            ['id' => implode(',', $ids)]);
    }

    public function listPlaylists(array $parts, array $opts = [])
    {
        return $this->service->playlists->listPlaylists(implode(',', $parts), $opts);
    }

    public function listPlaylistItems(array $parts, array $opts = [])
    {
        return $this->service->playlistItems->listPlaylistItems(implode(',', $parts), $opts);
    }
}
