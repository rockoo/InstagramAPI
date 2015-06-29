<?php namespace Instagram\Adapters\Http;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleAdapter extends HttpAbstract implements HttpAdapterInterface {
    /**
     * @var Instagram Access Token
     */
    protected $token;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var GuzzleException
     */
    protected $exception;

    /**
     * @param string $token
     * @param ClientInterface $client
     * @param GuzzleException $exception
     */
    public function __construct($token, ClientInterface $client = null, GuzzleException $exception = null)
    {
        $this->token       = $token;
        $this->client      = $client ?: new Client();
        $this->exception   = $exception;
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        $response = $this->client->get($this->urlMutator($url));

        return $this->_decodeStream($response->getBody());
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $data)
    {
        $data['access_token'] = $this->token;

        $response = $this->client->post($url, ['form_params' => $data]);

        return $this->_decodeStream($response->getBody());
    }

    /**
     * {@inheritdoc}
     */
    public function put($url)
    {
        // TODO: Implement put() method.
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        $response = $this->client->delete($this->urlMutator($url));

        return $this->_decodeStream($response->getBody());
    }

    /**
     * {@inheritdoc}
     */
    public function requestAccessToken($credentials, $code)
    {
        $formData = [
            'client_id'     => $credentials['client_id'],
            'client_secret' => $credentials['client_secret'],
            'redirect_uri'  => $credentials['redirect_uri'],
            'grant_type'    => 'authorization_code',
            'code'          => $code
        ];

        return $this->post(sprintf('%s', self::TOKEN_ENDPOINT), $formData);
    }


    /**
     * @param $url
     * @return string
     */
    function urlMutator($url)
    {
        $append  = strpos($url, '?') ? '&' : '?';
        $append .= "access_token={$this->token}";

        return $url.$append;
    }

    /**
     * @param $data
     * @return mixed
     */
    private function _decodeStream($data)
    {
        $stream = Stream::factory($data);

        return json_decode($stream);
    }
}