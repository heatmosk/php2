<?php

namespace app\services;

use app\traits\TSingleton;

class Db
{
  use TSingleton;

  private $config = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'login' => 'php1user',
    'password' => 'P@Svv0rd',
    'database' => 'php1',
    'charset' => 'utf8',
  ];

  /**
   * @var \PDO
   */
  private $connection = null;

  public function getConnection()
  {
    if (is_null($this->connection)) {
      $this->connection = new \PDO(
        $this->buildDsnString(),
        $this->config['login'],
        $this->config['password']
      );

      $this->connection->setAttribute(
        \PDO::ATTR_DEFAULT_FETCH_MODE,
        \PDO::FETCH_ASSOC
      );
    }

    return $this->connection;
  }

  private function query(string $sql, array $params = [])
  {
    $pdoStatement = $this->getConnection()->prepare($sql);
    $pdoStatement->execute($params);
    return $pdoStatement;
  }

  public function execute(string $sql, array $params = [])
  {
    return $this->query($sql, $params)->rowCount();
  }

  public function queryAllObjects($className, string $sql, array $params = [])
  {
    $pdoStatement = $this->query($sql, $params);
    $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
    return $pdoStatement->fetchAll();
  }

  public function queryObject($className, string $sql, array $params = [])
  {
    return array_shift($this->queryAllObjects($className, $sql, $params));
  }

  public function queryOne(string $sql, array $params = [])
  {
    return $this->queryAll($sql, $params)[0];
  }

  public function queryAll(string $sql, array $params = [], $fetch_style = null)
  {
    return $this->query($sql, $params)->fetchAll($fetch_style);
  }

  private function buildDsnString()
  {
    return sprintf(
      '%s:host=%s;dbname=%s;charset=%s',
      $this->config['driver'],
      $this->config['host'],
      $this->config['database'],
      $this->config['charset'],
    );
  }
  
  public function getLastInsertId()
  {
      return $this->getConnection()->lastInsertId();
  }
}
