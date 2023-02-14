<?php
class Connection
{
    public $host = 'localhost';
    public $dbname = 'factUNO';
    public $port = '5432';
    public $username = 'postgres';
    public $password = 'oracle';
    public $connect = null;
    public $driver = 'pgsql';
    public static function getConnection()
    {
        try {
            $connection = new Connection();
            $connection->connect = new PDO("{$connection->driver}:host={$connection->host};port={$connection->port};dbname={$connection->dbname};user={$connection->username};password={$connection->password}");
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection->connect;
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }
}
Connection::getConnection();
?>