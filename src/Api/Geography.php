<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class Geography extends InstagramAbstract {

    /**
     *  Get recent media from a geography subscription that you created.
     * Note: You can only access Geographies that were explicitly created by your OAuth client.
     * Check the Geography Subscriptions section of the real-time updates page.
     * When you create a subscription to some geography that you define,
     * you will be returned a unique geo-id that can be used in this query.
     * To backfill photos from the location covered by this geography,
     * use the media search endpoint.
     *
     * @param string $geoId
     * @return array | bool
     */
    public function getRecentMedia($geoId)
    {
        return $this->adapter->get(sprintf('%s/v1/geographies/%s/media/recent', self::ENDPOINT, $geoId));
    }
}