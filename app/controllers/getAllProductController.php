<?php
require "../models/productModel.php";
echo json_encode(Producto::getAllProducts());
