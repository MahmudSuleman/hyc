<?php

class Sessions
{
    public static function get(string $key)
    {
        return $_SESSION[$key];
    }

    public static function set(array $item)
    {
        $_SESSION[] = $item;
    }


    public static function get_error($key = null)
    {

        return $_SESSION['errors'][$key] ?? null;
    }

    public static function clear_errors()
    {

        $_SESSION['errors']= null;
    }

    public static function get_errors()
    {

        return $_SESSION['errors'];
    }

    public static function set_errors(String $key, String $value)
    {
        $_SESSION['errors'][$key] = $value;
    }

    public static function set_old_inputs(array $data)
    {
        foreach ($data as $d=> $val){
            $_SESSION['inputs'][$d] = $val;
        }

    }

    public static function get_old_input(string $key)
    {
        return $_SESSION['inputs'][$key] ?? null;
    }

    public static function get_old_inputs()
    {
        return $_SESSION['inputs'];
    }

    public static function clear_old_inputs():void
    {
        $_SESSION['inputs'] = null;
    }
}

