<?php namespace Fantasyrock\Instagram\Security;

interface CredentialsInterface {

    public function getLoginUrl(array $scope = []);

    public function setToken($token);

    public function getToken();

    public function deleteToken();

    public function getCredentials();
}