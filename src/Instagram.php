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
    public function userClient()
    {
        return new User($this->adapter);
    }

    /**
     * @return Media Api Object
     */
    public function mediaClient()
    {
        return new Media($this->adapter);
    }

    /**
     * @return Comment Api Object
     */
    public function commentClient()
    {
        return new Comment($this->adapter);
    }

    /**
     * @return Like Api Object
     */
    public function likeClient()
    {
        return new Like($this->adapter);
    }

    /**
     * @return Tag Api Object
     */
    public function tagClient()
    {
        return new Tag($this->adapter);
    }

    /**
     * @return Geography Api Object
     */
    public function geographyClient()
    {
        return new Geography($this->adapter);
    }

    /**
     * @return Location Api Object
     */
    public function locationClient()
    {
        return new Location($this->adapter);
    }

    /**
     * @return Relationship Api Object
     */
    public function relationshipClient()
    {
        return new Relationship($this->adapter);
    }

    /**
     * @return HttpAdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}