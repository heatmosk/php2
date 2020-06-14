<?php

namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
  protected $id = null;
  protected $db = null;

  public function __construct()
  {
    $this->db = Db::getInstance();
    $this->tableName = $this->getTableName();
  }

  public function getId()
  {
    return $this->id;
  }

  public static function getById(int $id)
  {
    $tableName = static::getTableName();
    $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
    return Db::getInstance()->queryObject(get_called_class(), $sql, ["id" => $id]);
  }

  public static function getAll()
  {
    $tableName = static::getTableName();
    $sql = "SELECT * FROM {$tableName}";
    return Db::getInstance()->queryAllObjects(get_called_class(), $sql);
  }
  public function insert()
  {
    $tableName = static::getTableName();
    $params = [];
    $columns = [];

    foreach ($this as $key => $value) {
      if (in_array($key, ['db', 'tableName'])) {
        continue;
      }

      $params[":{$key}"] = $value;
      $columns[] = "`{$key}`";
    }

    $columns = implode(", ", $columns);
    $placeholders = implode(", ", array_keys($params));

    $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
    $this->db->execute($sql, $params);
    $this->id = $this->db->getLastInsertId();
    return $this->id;
  }

  public function delete()
  {
    $tableName = static::getTableName();
    $sql = "DELETE FROM {$tableName} WHERE id = :id";
    return $this->db->execute($sql, [':id' => $this->id]);
  }

  public function save()
  {
    if ($this->id === null) {
      return $this->insert();
    }
    return $this->update();
  }

  public function update()
  {
    $tableName = static::getTableName();
    $params = [];
    $columns = [];
    foreach ($this as $key => $value) {
      if (in_array($key, ['id', 'db', 'tableName'])) {
        continue;
      }
      $columns[] = "{$key} = :{$key}";
      $params[":{$key}"] = $value;
    }
    $params[":id"] = $this->id;
    $columns = implode(", ", $columns);
    $sql = "UPDATE {$tableName} SET {$columns} WHERE id = :id";

    $this->db->execute($sql, $params);
  }
}
