<?php

namespace app\models;

class Session
{
  public static function Start()
  {
    session_start();
  }
  public static function Set($name, $value)
  {
    $_SESSION[$name] = $value;
  }

  public static function isSet($name): bool
  {
    return isset($_SESSION[$name]);
  }

  public static function Get($name)
  {
    return $_SESSION[$name];
  }

  public static function Close()
  {
    $_SESSION = [];
    session_destroy();
  }
}
