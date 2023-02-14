<!DOCTYPE html>
<html lang="en">

<head>
  <title>Facturar</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
  <link rel="shortcut icon" href="../../resources/images/uno_logo.png" type="image/x-icon">

</head>

<body>
  <div class="container">
    <div class="row justify-content-center p-5">
      <div class="col-sm-6">
        <img src="../../resources/images/bills.png" width="90">
        <h5>Consulta de Factura</h5>
        <hr />
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Cliente</th>
              <th>Monto</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody id="tbody"></tbody>
      </div>
    </div>
  </div>

  <script src="../JS/billsConsult.js"></script>


</body>

</html>