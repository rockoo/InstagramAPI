<?php namespace Instagram\Adapters;

interface SessionAdapterInterface {

    public function get();

    public function save($data);

    public function delete();

    public function update($data);
}