<?php namespace Fantasyrock\Instagram\Api;
/**
 * Class Media
 * @package Instagram\Api
 * @author Rok Nemet <rok@fantasyrock.com>
 */

use Fantasyrock\Instagram\Exceptions\InstagramException;
use Fantasyrock\Instagram\InstagramAbstract;

class Media extends InstagramAbstract
{
    /**
     * Get information about a media object.
     * The returned type key will allow you to differentiate
     * between image and video media.
     *
     * @param $mediaId
     */
    public function getInfo($mediaId)
    {
        return $this->adapter->get(sprintf("%s/v1/media/{$mediaId}", self::ENDPOINT));
    }

    /**
     * Search for media in a given area. The default time span is set to 5 days.
     * The time span must not exceed 7 days.
     * Defaults time stamps cover the last 5 days.
     * Can return mix of image and video types.
     * lat 	Latitude of the center search coordinate. If used, lng is required.
     * min_timestamp 	A unix timestamp. All media returned will be taken later than this timestamp.
     * lng 	Longitude of the center search coordinate. If used, lat is required.
     * max_timestamp 	A unix timestamp. All media returned will be taken earlier than this timestamp.
     * distance 	Default is 1km (distance=1000), max distance is 5km.
     */
    public function searchForMedia()
    {
        $argsBucket = ['lat', 'lng', 'min_timestamp', 'max_timestamp', 'distance'];
        $passedArgs = func_get_args();
        $appendArgs = '';

        if(count($passedArgs) > 0) {
            $appendArgs = '?';
            foreach($passedArgs[0] as $k=>$v) {
                if( !in_array($k, $argsBucket)) throw new InstagramException("You have passed an unknow argument {$k}");
                $appendArgs .= "{$k}={$v}&";
            }

            $appendArgs = rtrim($appendArgs, '&');
        }

        return $this->adapter->get(sprintf('%s/v1/media/search/'.$appendArgs, self::ENDPOINT));
    }

    /**
     * Get a list of what media is most popular at the moment.
     * Can return mix of image and video types.
     */
    public function getPopular()
    {
        return $this->adapter->get(sprintf("%s/v1/media/popular", self::ENDPOINT));
    }
}