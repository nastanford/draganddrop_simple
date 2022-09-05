<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/../classes/Database.php';
  class Users extends Database
  {
    // constructor
    public function __construct()
    {
      // echo "Users class instantiated<br>";
    }

    public function checkLogin($email,$password) 
    {
      $sql = "SELECT * FROM users WHERE email = ? and password = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$email,$password]);
      $results = $stmt->fetchAll();
      return $results;
    }

    public function getUser($firstname,$lastname,$email) 
    {
      $sql = "SELECT * FROM users WHERE firstname like ? and lastname like ? and email like ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$firstname,$lastname,$email]);
      $results = $stmt->fetchAll();
      return $results;
    }

    public function getByID($id) 
    {
      $sql = "SELECT * FROM users WHERE id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
      $results = $stmt->fetchAll();
      return $results;
    }  
    
    public function getAll() 
    {
      $sql = "SELECT * FROM users order by lastname, firstname";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    }
    // 
    public function insert($firstname,$lastname,$email,$password) 
    {
      $sql = "INSERT INTO users (firstname,lastname,email,password) VALUES (:firstname, :lastname, :email, :password)";
      $stmt = $this->connect()->prepare($sql)->execute($firstname,$lastname,$email,$password);     
      return;
    }
  
    public function update($firstname,$lastname,$email) 
    {
      $sql = "SELECT * FROM users WHERE firstname like ? and lastname like ? and email like ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$firstname,$lastname,$email]);
      $results = $stmt->fetchAll();
      return $results;
    }
  

  }

/*


$data = [
    'name' => $name,
    'surname' => $surname,
    'sex' => $sex,
];
$sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

or you can chain execute() to prepare():

$sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
$pdo->prepare($sql)->execute($data);


*/

?>