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
        return $this->adapter->get(sprintf('%s/v1/users/%s', self::ENDPOINT, $userId));
    }

    /**
     * See the authenticated user's feed.
     */
    public function getFeed()
    {
        return $this->adapter->get(sprintf('%s/v1/users/self/feed', self::ENDPOINT));
    }

    /**
     * Get the most recent media published by a user.
     * To get the most recent media published by the owner of the access token,
     * you can use self instead of the user-id.
     */
    public function getRecentMedia($userId = 'self', $options = [])
    {
        $argsBucket = ['count', 'min_timestamp', 'max_timestamp', 'min_id', 'max_id'];
        $appendArgs = '';

        if(count($options) > 0) {
            $appendArgs = '?';
            foreach($options as $k=>$v) {
                if( !in_array($k, $argsBucket)) throw new InstagramException("You have passed an unknow argument {$k}");
                $appendArgs .= "{$k}={$v}&";
            }

            $appendArgs = rtrim($appendArgs, '&');
        }

        return $this->adapter->get(sprintf('%s/v1/users/%s/media/recent'.$appendArgs, self::ENDPOINT, $userId));
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
        return $this->adapter->get(sprintf('%s/v1/users/self/media/liked?count='.$count, self::ENDPOINT));
    }

    /**
     * Search for a user by name.
     *
     * @param string $query
     * @param int $count
     */
    public function searchForUser($query = '', $count = 20)
    {
        return $this->adapter->get(sprintf('%s/v1/users/search?q='.$query.'&count='.$count, self::ENDPOINT));
    }

}