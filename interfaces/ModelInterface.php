<?php

namespace app\interfaces;

interface ModelInterface
{
  public static function getById(int $id);

  public static function getAll();

  public static function getTableName(): string;

  public function insert();

  public function delete();

  public function update(); 
  
  public function save();
}
