<?php

namespace app\models;

class User extends Model
{
  protected $login;
  protected $password;
  protected $email;

  public static function getTableName(): string
  {
    return "users";
  } 

  public function setLogin($login)
  {
    $this->login = $login;
    return $this;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function setPassword($password)
  {
    $this->password = md5($password);
    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function checkPassword($password)
  {
    return $this->password === md5($password);
  }
}
