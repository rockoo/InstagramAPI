<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class User extends InstagramAbstract {

    /**
     * Get basic information about a user.
     * To get information about the owner of the access token,
     * you can use self instead of the user-id.
     *
     * @param string $userId
     */
    public function getInfo($userId = 'self')
    {
        // https://api.instagram.com/v1/users/{user-id}/?access_token=ACCESS-TOKEN

    }

    /**
     * See the authenticated user's feed.
     */
    public function getFeed()
    {
        // https://api.instagram.com/v1/users/self/feed?access_token=ACCESS-TOKEN
    }

    /**
     * Get the most recent media published by a user.
     * To get the most recent media published by the owner of the access token,
     * you can use self instead of the user-id.
     */
    public function getRecentMedia($userId = 'self')
    {
        // https://api.instagram.com/v1/users/{user-id}/media/recent/?access_token=ACCESS-TOKEN
    }

    /**
     * See the list of media liked by the authenticated user.
     * Private media is returned as long as the authenticated user has permission to view that media.
     * Liked media lists are only available for the currently authenticated user.
     *
     * @param int $count
     */
    public function getLiked($count = 20)
    {
        // https://api.instagram.com/v1/users/self/media/liked?access_token=ACCESS-TOKEN
    }

    /**
     * Search for a user by name.
     *
     * @param string $query
     * @param int $count
     */
    public function searchForUser($query = '', $count = 20)
    {
        // https://api.instagram.com/v1/users/search?q=jack&access_token=ACCESS-TOKEN

    }

}