<?php

namespace app\models;

use app\models\auth; 

class User extends Record
{
  protected $login;
  protected $password;
  protected $email;
  public function __construct($login = null, $password = null, $email = null)
  {
    $this->login = $login;
    $this->password = $this->setPassword($password);
    $this->email = $email;
  }

  public static function getTableName(): string
  {
    return "users";
  }

  public function setLogin($login): User
  {
    $this->login = $login;
    return $this;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function setPassword($password): User
  {
    $this->password = Auth::getHash($password);
    return $this;
  }

  public function getPasswordHash()
  {
    return $this->password;
  }

  public function setEmail($email): User
  {
    $this->email = $email;
    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }
}
