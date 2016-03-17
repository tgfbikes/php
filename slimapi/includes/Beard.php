<?php

class Beard {
  
  private $connection;
  
  function __construct() {
    // connect to database
    $this->connection = new PDO('mysql:host=mysql.cs.dixie.edu;dbname=sking', 'sking', 'P@$$word');
  }
  
  function getBeards() {
    $sql = 'SELECT * FROM beards';
    $statement = $this->connection->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function createBeard($beard) {
    $sql = 'INSERT INTO beards (name, beard_type, awesomeness, age) 
            VALUES (:name, :beard_type, :awesomeness, :age)';
    
    $statement = $this->connection->prepare($sql);
    $statement->bindParam('name',        $beard['name']);
    $statement->bindParam('beard_type',  $beard['beard_type']);
    $statement->bindParam('awesomeness', $beard['awesomeness']);
    $statement->bindParam('age',         $beard['age']);
    if ($statement->execute()) {
      return $this->getBeard($this->connection->lastInsertId);
    } else {
      return false;
    }
  }
  
  function getBeard($beard_id) {
    $sql = 'SELECT * FROM beards WHERE id = :beard_id';
    $statement = $this->connection->prepare($sql);
    $statement->bindParam('beard_id', $beard_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  
}

?>