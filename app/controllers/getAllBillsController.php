<?php
require "../models/BillsModel.php";
echo json_encode(Factura::getAllBills());
