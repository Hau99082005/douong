<?php 
class Database {
    static $mysqli;
    public static function getConnection() {
        if(self::$mysqli == null) 
            return new mysqli("localhost", "root", "", "bao");
        return null;
    }
    public static function query($s) {
        return self::getConnection()->query($s);
    }
  }
?>