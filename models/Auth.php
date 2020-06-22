<?php


namespace app\models;

use app\models\User;

class Auth
{

  public static function getUser($login, $password)
  {
    $users = User::getAll();
    foreach ($users as $user) {
      if (
        $user->getLogin() === $login &&
        $user->getPasswordHash() === static::getHash($password)
      ) {
        return $user;
      }
    }
    return false;
  }

  public static function getHash($str)
  {
    return md5($str);
  }
}
