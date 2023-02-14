<?php
require_once "../config/connection.php";
class Client extends Connection
{
  public static function getAllClients()
  {
    try {
      $sql = "SELECT * FROM cliente";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function getClientById($id)
  {
    try {
      $sql = "SELECT * FROM cliente WHERE id_cliente = :id";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function insertClient($data)
  {
    $estado = 'A';

    try {
      $sql = "INSERT INTO cliente (nombres,email,edad,direccion,estado) VALUES (:nombres, :email, :edad, :direccion,:estado)";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':nombres', $data['nombres']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':edad', $data['edad']);
      $stmt->bindParam(':direccion', $data['direccion']);
      $stmt->bindParam(':estado', $estado);
      $stmt->execute();
      return true;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
}
