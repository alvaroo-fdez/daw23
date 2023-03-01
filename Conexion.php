<?php
    
class Conexion extends PDO{
    private $dsn = "mysql:host=localhost:3307;dbname=espectaculos";
    private $user = "root";
    private $pass = "";
    
    function __construct() {
        parent::__construct($this->dsn, $this->user, $this->pass);
    }
}