<?php
require_once "../config/connection.php";
class Producto extends Connection
{
  public static function getAllProducts()
  {
    try {
      $sql = "SELECT * FROM producto";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }

  public static function getProductById($id)
  {
    try {
      $sql = "SELECT * FROM producto WHERE id_producto = :id";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function insertProduct($data)
  {
    $estado = 'A';

    try {
      $sql = "INSERT INTO producto (nombre,descripcion,precio_venta,precio_compra,tasa_impuesto,estado) VALUES (:nombre, :descripcion, :precio_venta, :precio_compra,:tasa_impuesto,:estado)";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':nombre', $data['nombre']);
      $stmt->bindParam(':descripcion', $data['descripcion']);
      $stmt->bindParam(':precio_venta', $data['precio_venta']);
      $stmt->bindParam(':precio_compra', $data['precio_compra']);
      $stmt->bindParam(':tasa_impuesto', $data['tasa_impuesto']);
      $stmt->bindParam(':estado', $estado);
      $stmt->execute();
      return true;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
}
