<?php namespace Instagram\Adapters;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Exception\GuzzleException;
use Instagram\Security\CredentialsInterface;

class GuzzleAdapter implements HttpAdapterInterface {
    protected $token;

    protected $client;

    protected $exception;

    public function __construct($token, ClientInterface $client = null, GuzzleException $exception = null)
    {
        $this->token       = $token;
        $this->client      = $client ?: new Client();
        $this->exception   = $exception;
    }

    public function get($url)
    {
        $url = $this->urlMutator($url);

        $response = $this->client->get($url);

        return $this->_decodeStream($response->getBody());
    }

    public function post($url, array $data)
    {
        $response = $this->client->post($url, ['form_params' => $data]);

        return $this->_decodeStream($response->getBody());
    }

    public function put($url)
    {
        // TODO: Implement put() method.
    }

    public function delete($url)
    {
        // TODO: Implement delete() method.
    }

    public function requestAccessToken($credentials, $code)
    {
        $formData = [
            'client_id'     => $credentials['client_id'],
            'client_secret' => $credentials['client_secret'],
            'redirect_uri'  => $credentials['redirect_uri'],
            'grant_type'    => 'authorization_code',
            'code'          => $code
        ];

        return $this->post('https://api.instagram.com/oauth/access_token', $formData);
    }


    function urlMutator($url)
    {
        $append  = strpos($url, '?') ? '&' : '?';
        $append .= "access_token={$this->token}";

        return $url.$append;
    }

    private function _decodeStream($data)
    {
        $stream = Stream::factory($data);

        return json_decode($stream);
    }
}