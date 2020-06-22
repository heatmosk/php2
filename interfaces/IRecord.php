<?php

namespace app\interfaces;

interface IRecord
{
  public static function getById(int $id): IRecord;

  public static function getAll(): array;

  public static function getTableName(): string;

  public function insert();

  public function delete();

  public function update(); 
  
  public function save();
}
