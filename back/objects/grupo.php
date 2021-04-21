<?php
class grupo
{
  // database connection and table name
  private $conn;
  private $table_name = "agenda";

  // object properties
  public $personalCti;
  public $hisopadores;
  public $personalSalud;
  public $personalEducacion;
  public $bomberos;
  public $policia;
  public $personalResidencia;

  // constructor with $db as database connection
  public function __construct($db)
  {
    $this->conn = $db;
  }

  function cantidadGrupos()
  {
    for ($counter = 1; $counter < 8; $counter++) {

      $query = "SELECT COUNT(idGrupo) FROM usuario 
    INNER JOIN agenda ON agenda.idUsuario=usuario.idUsuario 
    WHERE idGrupo = $counter;";

      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      switch ($counter) {
        case (1):
          if ($row != null) {
            $this->personalCti = $row['COUNT(idGrupo)'];
          } else {
            $this->personalCti = "0";
          }
          break;
        case (2):
          if ($row != null) {
            $this->hisopadores = $row['COUNT(idGrupo)'];
          } else {
            $this->hisopadores = "0";
          }
          break;
        case (3):
          if ($row != null) {
            $this->personalSalud = $row['COUNT(idGrupo)'];
          } else {
            $this->personalSalud = "0";
          }
          break;
        case (4):
          if ($row != null) {
            $this->personalEducacion = $row['COUNT(idGrupo)'];
          } else {
            $this->personalEducacion = "0";
          }
          break;
        case (5):
          if ($row != null) {
            $this->bomberos = $row['COUNT(idGrupo)'];
          } else {
            $this->bomberos = "0";
          }
          break;
        case (6):
          if ($row != null) {
            $this->policia = $row['COUNT(idGrupo)'];
          } else {
            $this->policia = "0";
          }
          break;
        case (7):
          if ($row != null) {
            $this->personalResidencia = $row['COUNT(idGrupo)'];
          } else {
            $this->personalResidencia = "0";
          }
          break;
      }
    }
  }
}
