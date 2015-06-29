<?php namespace Instagram\Adapters\Storage;

/**
 * Interface SessionAdapterInterface
 * @package Instagram\Adapters
 * @author Rok Nemet <rok@fantasyrock.com>
 */
interface SessionAdapterInterface {

    /**
     * @return mixed
     */
    public function get();

    /**
     * @param array $data
     */
    public function save($data);

    /**
     * @return mixed
     */
    public function delete();
}