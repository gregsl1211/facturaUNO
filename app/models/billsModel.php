<?php
require_once "../config/connection.php";
class Factura extends Connection
{
    public static function insertBillsEnc($data)
    {
        $estado = 'A';

        try {
            $conn = Connection::getConnection();
            $sql = "INSERT INTO factura (id_cliente,monto,monto_impuesto,estado) VALUES (:id_cliente, :monto, :monto_impuesto,:estado)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_cliente', $data['id_cliente']);
            $stmt->bindParam(':monto', $data['monto_total']);
            $stmt->bindParam(':monto_impuesto', $data['monto_impuesto_total']);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            $id_factura = $conn->lastInsertId();
            return  $id_factura;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public static function insertBillsDet($data)
    {
        $estado = 'A';
        try {
            $conn = Connection::getConnection();
            $sql = "INSERT INTO factura_det (id_factura,id_producto,cantidad,monto_total,monto_total_impuesto,estado) VALUES (:id_factura,:id_producto, :cantidad, :monto_total,:monto_total_impuesto, :estado)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_factura', $data['id_factura']);
            $stmt->bindParam(':id_producto', $data['id_producto']);
            $stmt->bindParam(':cantidad', $data['cantidad']);
            $stmt->bindParam(':monto_total', $data['totalProd']);
            $stmt->bindParam(':monto_total_impuesto', $data['totalImpProd']);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            $id_factura_det = $conn->lastInsertId();
            return $id_factura_det;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public static function getAllBills()
    {
        try {
            $sql = "select f.id_factura, f.monto, f.fecha_insercion, c.nombres as nombre_cliente from factura f,cliente c where c.id_cliente = f.id_cliente;";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
