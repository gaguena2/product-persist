<?php

namespace Gaguena\ProductPersist\Infra\Db;

use PDO;

trait Database {

  public static function Connect() {
    $config = self::Config();
    $pdo =  new PDO( "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config['DB_USER'], $config['DB_PASSWORD'] );
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $pdo;
  }

  private static function Config() {
    return [
        "DB_HOST" => getenv('DB_HOST'),
        "DB_NAME" => getenv('DB_NAME'),
        "DB_USER" => getenv('DB_USER'),
        "DB_PASSWORD" => getenv('DB_PASSWORD')];
  }
}

