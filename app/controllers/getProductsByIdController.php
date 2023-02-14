<?php
require "../models/productModel.php";
$x = $_POST["id_producto"];
echo json_encode(Producto::getProductById($_POST["id_producto"]));
