<?php namespace Instagram\Api;

use Instagram\InstagramAbstract;

class Tag extends InstagramAbstract {

    /**
     * Get information about a tag object.
     *
     * @param string $tagId
     * @return array
     */
    public function getInfo($tag)
    {
        return $this->adapter->get(sprintf('%s/v1/tags/%s', self::ENDPOINT, $tag));
    }

    /**
     * Get a list of recently tagged media.
     * Use the max_tag_id and min_tag_id parameters
     * in the pagination response to paginate through these objects.
     *
     * @param string $tag
     * @return array
     */
    public function getRecent($tag)
    {
        return $this->adapter->get(sprintf('%s/v1/tags/%s/media/recent', self::ENDPOINT, $tag));
    }

    /**
     * Search for tags by name.
     *
     * @param string $query
     * @return array
     */
    public function search($query = '')
    {
        return $this->adapter->get(sprintf('%s/v1/tags/search?q=%s', self::ENDPOINT, $query))
    }
}