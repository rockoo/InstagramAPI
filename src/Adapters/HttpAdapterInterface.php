<?php namespace Instagram\Adapters;

interface HttpAdapterInterface {

    public function get($url);

    public function post($url, array $data);

    public function put($url);

    public function delete($url);

    public function requestAccessToken($credentials, $code);
}