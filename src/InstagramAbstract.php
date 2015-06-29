<?php namespace Instagram;

use Instagram\Adapters\HttpAdapterInterface;

abstract class InstagramAbstract {
    const ENDPOINT = 'https://api.instagram.com';

    protected $adapter;

    public function __construct(HttpAdapterInterface $adapter) {
        $this->adapter = $adapter;
    }
}