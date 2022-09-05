<?php
  $configPath = $_SERVER['DOCUMENT_ROOT'].'/../Config.php';
  include $configPath;
  $config = new Config();

  class Database 
  {
    // constructor
    public function __construct()
    {

    }
  // Config::DB_CONNECTION;
    private $host = Config::DB_HOST;
    private $user = "root";
    private $password = "";
    private $database = "php_simple";

    function connect() {
      $dsn = "mysql:host=".$this->host.";dbname=".$this->database;
      $pdo = new PDO($dsn, $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    }
  }
?>