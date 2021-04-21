<?php

class usuario
{

  // database connection and table name
  private $conn;
  private $table_name = "usuario";

  // object properties
  public $id_user;
  public $name;
  public $surname;
  public $birthDate;
  public $telephone;
  public $id_group;
  public $active;

  public $group1;
  public $group2;
  public $group3;

  // constructor with $db as database connection
  public function __construct($db)
  {
    $this->conn = $db;
  }

  function existenceVerify()
  {
    $query = "SELECT * FROM $this->table_name
     WHERE idUsuario = ?";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // bind id of product to be updated
    $stmt->bindParam(1, $this->id_user);

    // execute query
    $stmt->execute();

    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set values to object properties
    $this->id_user = $row['idUsuario'];
    
  }

  function telephoneExistence()
  {
    $query = "SELECT telefono FROM  $this->table_name WHERE idUsuario = ?;";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id_user);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->telephone = $row['telefono'];
  }

  function addTelephone()
  {
    $query = "UPDATE $this->table_name SET telefono = ? WHERE idUsuario = ?;";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->telephone);

    $stmt->bindParam(2, $this->id_user);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->telephone = $row['telefono'];
    $this->id_user = $row['idUsuario'];
  }

  function contarEdad()
  {
    $actualDate = date('Y-m-d');
    $d18 = date('Y-m-d', strtotime($actualDate."- 18 years"));
    $d30 = date('Y-m-d', strtotime($actualDate."- 30 years"));
    $d50 = date('Y-m-d', strtotime($actualDate."- 50 years"));
    $d65 = date('Y-m-d', strtotime($actualDate."- 65 years"));
    //GRUPO 1: 18 A 30
    //GRUPO 2: 31 A 50
    //GRUPO 3: 51 A 65
    for ($counter = 1; $counter < 4; $counter++) {

      switch ($counter) {
        case (1):

          $query = "SELECT COUNT(fechaNacimiento) FROM usuario
           INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario
            WHERE fechaNacimiento BETWEEN '$d30' AND '$d18'";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($row != null) {
            $this->group1 = $row['COUNT(fechaNacimiento)'];
          } else {
            $this->group1 = "0";
          }
          break;
        case (2):

          $query = "SELECT COUNT(fechaNacimiento) FROM usuario 
          INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario 
          WHERE fechaNacimiento BETWEEN '$d50' AND '$d30'";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($row != null) {
            $this->group2 = $row['COUNT(fechaNacimiento)'];
          } else {
            $this->group2 = "0";
          }
          break;
        case (3):

          $query = "SELECT COUNT(fechaNacimiento) FROM usuario 
          INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario 
          WHERE fechaNacimiento BETWEEN '$d65' AND '$d50'";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($row != null) {
            $this->group3 = $row['COUNT(fechaNacimiento)'];
          } else {
            $this->group3 = "0";
          }
          break;
      }
    }
  }
}
