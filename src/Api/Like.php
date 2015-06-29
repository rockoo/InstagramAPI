<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class Like extends InstagramAbstract
{

    /**
     * Get a list of users who have liked this media.
     *
     * @param $mediaId
     * @return array | Exception
     */
    public function getLikes($mediaId)
    {
        return $this->adapter->get(sprintf('%s/v1/media/%s/likes', self::ENDPOINT, $mediaId));
    }

    /**
     * Set a like on this media by the currently authenticated user.
     *
     * @param $mediaId
     * @return bool
     */
    public function addLike($mediaId)
    {
        return $this->adapter->post(sprintf('%s/v1/media/%s/likes', self::ENDPOINT, $mediaId), []);
    }

    /**
     * Remove a like on this media by the currently authenticated user.
     *
     * @param $mediaId
     * @return bool
     */
    public function deleteLike($mediaId)
    {
        return $this->adapter->delete(sprintf('%s/v1/media/%s/likes', self::ENDPOINT, $mediaId));
    }
}