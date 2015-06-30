<?php namespace Instagram\Adapters\Storage;

session_start();

class NativeSessionAdapter extends SessionAbstract implements SessionAdapterInterface {

    public function get()
    {
        return ( isset($_SESSION[self::SESSION_KEY])) ? $_SESSION[self::SESSION_KEY] : false;
    }

    public function save($data)
    {
        return $_SESSION[self::SESSION_KEY] = $data ? true : false;
    }

    public function delete()
    {
        if( isset($_SESSION[self::SESSION_KEY])) unset($_SESSION[self::SESSION_KEY]);
    }
}