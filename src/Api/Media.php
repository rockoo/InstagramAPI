<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class Media extends InstagramAbstract
{
    /**
     * Get information about a media object.
     * The returned type key will allow you to differentiate
     * between image and video media.
     *
     * @param $mediaId
     */
    public function getInfo($mediaId)
    {
        $this->adapter->get(sprintf("%s/v1/media/{$mediaId}", self::ENDPOINT));
    }

    /**
     * Search for media in a given area. The default time span is set to 5 days.
     * The time span must not exceed 7 days.
     * Defaults time stamps cover the last 5 days.
     * Can return mix of image and video types.
     */
    public function searchForMedia()
    {
        // https://api.instagram.com/v1/media/search?lat=48.858844&lng=2.294351&access_token=ACCESS-TOKEN
    }

    /**
     * Get a list of what media is most popular at the moment.
     * Can return mix of image and video types.
     */
    public function getPopular()
    {
        return $this->adapter->get(sprintf("%s/v1/media/popular", self::ENDPOINT));
    }
}