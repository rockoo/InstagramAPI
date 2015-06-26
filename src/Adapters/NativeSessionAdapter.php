<?php namespace Instagram\Adapters;

session_start();

class NativeSessionAdapter extends SessionAbstract implements SessionAdapterInterface {
    public function get()
    {
        return $_SESSION[self::SESSION_KEY];
    }

    public function save($data)
    {
        $_SESSION[self::SESSION_KEY] = $data;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function update($data)
    {
        // TODO: Implement update() method.
    }

}