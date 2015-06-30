<?php namespace Instagram\Security;

use Instagram\Adapters\Storage\SessionAdapterInterface;

class Credentials implements CredentialsInterface {
    protected $credentials;

    protected $session;

    public function __construct(array $credentials, SessionAdapterInterface $session = null)
    {
        $this->credentials = $credentials;
        $this->session     = $session;
    }

    public function getLoginUrl(array $scope = [])
    {
        $scope = ( !$scope) ? implode('+', $this->credentials['scope']) : implode('+', $scope);

        return sprintf('https://api.instagram.com/oauth/authorize/?client_id=%s&redirect_uri=%s&response_type=code&scope=%s', $this->credentials['client_id'], $this->credentials['redirect_uri'], $scope);
    }

    public function setToken($token)
    {
        return ($this->session->save($token)) ? true : false;
    }

    public function getToken()
    {
        return $this->session->get();
    }

    public function deleteToken()
    {
        $this->session->delete();
    }

    public function getCredentials()
    {
        return $this->credentials;
    }
}