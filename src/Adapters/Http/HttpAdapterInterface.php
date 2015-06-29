<?php namespace Instagram\Adapters\Http;

/**
 * Interface HttpAdapterInterface
 * @package Instagram\Adapters
 * @author Rok Nemet <rok@fantasyrock.com>
 */

interface HttpAdapterInterface {

    /**
     * @param string $url
     * @return obj
     */
    public function get($url);

    /**
     * @param string $url
     * @param array $data
     * @return bool
     */
    public function post($url, array $data);

    /**
     * @param $url
     *
     * @return bool
     */
    public function put($url);

    /**
     * @param $url
     * @return bool
     */
    public function delete($url);

    /**
     * @param array $credentials
     * @param string $code
     * @return stdObj
     */
    public function requestAccessToken($credentials, $code);
}