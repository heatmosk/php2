<?php

namespace services;

class Autoloader
{
  public $paths = [
    'models',
    'services'
  ];

  public function loadClass(string $classname)
  {
    $filename = __DIR__  . "/../" . $classname . ".php";
    if (file_exists($filename)) {
      require $filename;
      return true;
    }
    return false;
  }
}
