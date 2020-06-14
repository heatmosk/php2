<?php

namespace app\services;

class Autoloader
{
  public $paths = [
    'models',
    'services'
  ];

  public function loadClass(string $classname)
  {
    $filename = realpath(str_replace('app\\', ROOT_DIR, $classname) . ".php");
    if (file_exists($filename)) {
      require $filename;
      return true;
    }
    return false;
  }
}
