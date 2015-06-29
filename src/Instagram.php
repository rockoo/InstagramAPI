<?php namespace Instagram;

use Instagram\Adapters\HttpAdapterInterface;
use Instagram\Adapters\SessionAdapterInterface;
use Instagram\Api\User;
use Instagram\Api\Comment;
use Instagram\Api\Geography;
use Instagram\Api\Like;
use Instagram\Api\Location;
use Instagram\Api\Media;
use Instagram\Api\Relationship;
use Instagram\Api\Tag;
use Instagram\Security\Credentials;
use Instagram\Security\CredentialsInterface;

class Instagram {
    protected $adapter;

    public function __construct(HttpAdapterInterface $adapter) {
        $this->adapter = $adapter;
    }

    /**
     * @return User Api Object
     */
    public function UserClient()
    {
        return new User($this->adapter);
    }

    /**
     * @return Media Api Object
     */
    public function MediaClient()
    {
        return new Media($this->adapter);
    }

    /**
     * @return Comment Api Object
     */
    public function CommentClient()
    {
        return new Comment($this->adapter);
    }

    public function getAdapter()
    {
        return $this->adapter;
    }
}