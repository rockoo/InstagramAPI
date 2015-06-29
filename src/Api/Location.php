<?php namespace Fantasyrock\Instagram\Api;

use Fantasyrock\Instagram\InstagramAbstract;

class Location extends InstagramAbstract {

    /**
     * Get information about a location.
     *
     * @param string $locationId
     * @return array
     */
    public function getInfo($locationId)
    {
        return $this->adapter->get(sprintf('%s/v1/locations/%s', self::ENDPOINT, $locationId));
    }

    /**
     * Get a list of recent media objects from a given location.
     *
     * @param string $locationId
     * @return array
     */
    public function getRecent($locationId)
    {
        return $this->adapter->get(sprintf('%s/v1/locations/%s/media/recent', self::ENDPOINT, $locationId));
    }

    /**
     * Search for a location by geographic coordinate.
     *
     * @return array
     * @throws InstagramException
     */
    public function search()
    {
        $argsBucket = ['lat', 'lng', 'facebook_places_id', 'foursquare_id', 'foursquare_v2_id', 'distance'];
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

        return $this->adapter->get(sprintf('%s/v1/locations/search'.$appendArgs, self::ENDPOINT));
    }
}