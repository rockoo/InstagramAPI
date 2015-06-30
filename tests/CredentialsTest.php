<?php

require('./vendor/autoload.php');

use Instagram\Adapters\Storage\NativeSessionAdapter;
use Instagram\Security\Credentials;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{

    protected $credentials;

    public function __construct()
    {
        $storage = new NativeSessionAdapter();

        $this->credentials = new Credentials([
            'client_id'     => 'something',
            'client_secret' => 'else',
            'redirect_uri'  => 'http://gohere.com',
            'scope'         => ['basic']
        ], $storage);
    }

    public function testLoginUrl()
    {
        $match = (strpos($this->credentials->getLoginUrl(), 'api.instagram.com') > 0) ? true : false;

        $this->assertTrue($match);
    }

    public function testCredentialsDump()
    {
        $credentials = $this->credentials->getCredentials();

        $this->assertArrayHasKey('client_id', $credentials);
        $this->assertArrayHasKey('client_secret', $credentials);
        $this->assertArrayHasKey('redirect_uri', $credentials);
        $this->assertArrayHasKey('scope', $credentials);
    }

    public function testSetTokenResponse()
    {
        $token = md5(time());

        $this->assertTrue($this->credentials->setToken($token));
    }
}