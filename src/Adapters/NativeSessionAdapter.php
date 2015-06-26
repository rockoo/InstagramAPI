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
        if( isset($_SESSION[self::SESSION_KEY])) unset($_SESSION[self::SESSION_KEY]);
    }
}