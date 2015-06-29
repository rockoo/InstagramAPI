<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class Comment extends InstagramAbstract {

    /**
     * Get a list of recent comments on a media object.
     *
     * @param string $mediaId
     */
    public function getComments($mediaId)
    {
        return $this->adapter->get(sprintf('%s/v1/media/%s/comments', self::ENDPOINT, $mediaId));
    }

    /**
     * Create a comment on a media object with the following rules:
     * The total length of the comment cannot exceed 300 characters.
     * The comment cannot contain more than 4 hashtags.
     * The comment cannot contain more than 1 URL.
     * The comment cannot consist of all capital letters.
     *
     * @param string $mediaId
     * @param string $text
     */
    public function addComment($mediaId, $text = '')
    {
        return $this->adapter->post(sprintf('%s/v1/media/%s/comments', self::ENDPOINT, $mediaId), ['text' => $text]);
    }

    /**
     * Remove a comment either on the authenticated user's media object
     * or authored by the authenticated user.
     *
     * @param string $mediaId
     * @param string $commentId
     */
    public function deleteComment($mediaId, $commentId)
    {
        return $this->adapter->delete(sprintf('%s/v1/media/%s/comments/%s', self::ENDPOINT, $mediaId, $commentId));
    }
}