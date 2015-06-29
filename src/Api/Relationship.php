<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class Relationship extends InstagramAbstract {

    /**
     * Get the list of users this user follows.
     *
     * @param integer | userId
     */
    public function getFollowing($userId = 'self')
    {
        return $this->adapter->get(sprintf('%s/v1/users/%s/follows', self::ENDPOINT, $userId));
    }

    /**
     * Get the list of users this user is followed by.
     *
     * @param integer | string $userId
     * @return array
     */
    public function getFollowers($userId = 'self')
    {
        return $this->adapter->get(sprintf('%s/v1/users/%s/followed-by', self::ENDPOINT, $userId));
    }

    /**
     * List the users who have requested this user's permission to follow.
     *
     * @return array
     */
    public function getRequests()
    {
        return $this->adapter->get(sprintf('%s/v1/users/self', self::ENDPOINT));
    }


    /**
     * Get information about a relationship to another user.
     *
     * @param string $userId
     * @return array
     */
    public function getRelationship($userId = 'self')
    {
        return $this->adapter->get(sprintf('%s/v1/users/%s/relationship', self::ENDPOINT, $userId));
    }

    /**
     * Modify the relationship between the current user and the target user.
     *
     * @param $userId
     * @return bool
     */
    public function updateRelationship($userId, $action = '')
    {
        $allowedActions = ['follow', 'unfollow', 'block', 'unblock', 'approve', 'ignore'];

        if( !in_array($action, $allowedActions)) throw new InstagramException("You have passed an unknow argument {$action}");

        return $this->adapter->get(sprintf('%s/v1/users/%s/relationship', self::ENDPOINT, $userId), ['action' => $action]);
    }
}