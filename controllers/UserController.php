<?php


namespace app\controllers;

use app\models\Auth;
use app\models\Session;

class UserController extends Controller
{
  public function actionLogin()
  {
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $login = $_POST["login"];
      $pass  = $_POST["password"];
      $user = Auth::getUser($login, $pass);
      if ($user !== false) {
        Session::Set("user_id", $user->getId());
      }
      $message = "Auth failed";
    }

    if (Session::isSet("user_id")) {
      header("Location: /index.php?c=user");
    }

    echo $this->render("login", ["message" => $message]);
  }
  
  public function actionLogout()
  {
    Session::Close();
    header("Location: /");
  }

  public function actionIndex() {
    echo $this->render("lk", ["greeting" => "Личный кабинет"]);
  }
}
