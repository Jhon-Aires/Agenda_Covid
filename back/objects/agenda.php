<?php

class agenda
{

  // database connection and table name
  private $conn;
  private $table_name = "agenda";

  // object properties
  public $id_user;
  public $dateV1;
  public $dateV2;

  // constructor with $db as database connection
  public function __construct($db)
  {
    $this->conn = $db;
  }

  function agendar()
  {
    $query = "INSERT INTO $this->table_name VALUES(?, ?, ?);";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id_user);
    $stmt->bindParam(2, $this->dateV1);
    $stmt->bindParam(3, $this->dateV2);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id_user = $row['idUsuario'];
    $this->dateV1 = $row['fechaV1'];
    $this->dateV2 = $row['fechaV2'];
  }

  function consultar()
  {
    $query = "select * from $this->table_name where idUsuario = ?;";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id_user);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id_user = $row['idUsuario'];
    $this->dateV1 = $row['fechaV1'];
    $this->dateV2 = $row['fechaV2'];
  }

  function usuAgendVerify()
  {

    $query = "select idUsuario from $this->table_name where idUsuario = ?;";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id_user);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id_user = $row['idUsuario'];
  }

  function borrar()
  {
    $query = "DELETE FROM $this->table_name WHERE idUsuario = ?;";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id_user);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->execute() != false) {
      return true;
    }
    return false;
  }
}
