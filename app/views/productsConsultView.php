<!DOCTYPE html>
<html lang="en">

<head>
  <title>Productos</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
  <link rel="shortcut icon" href="../../resources/images/uno_logo.png" type="image/x-icon">

</head>

<body>
  <div class="container">
    <div class="row justify-content-center p-5">
      <div class="col-sm-6">
        <img src="../../resources/images/product.png" width="90">
        <br />
        <h5>Reporte de productos</h5>
        <hr />
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Precio Compra</th>
              <th>Precio Venta</th>
              <th>Monto Impuesto</th>
              <th>Precio Final</th>
            </tr>
          </thead>
          <tbody id="tbody"></tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="../JS/product.js"></script>

</body>

</html>