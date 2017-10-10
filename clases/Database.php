<?php
class Database{
    private function __construct() {
        ;
    }
    
    public static function getConnection(){
        return new PDO("mysql:host=localhost:3306;dbname=soler", "root","");
    }
}