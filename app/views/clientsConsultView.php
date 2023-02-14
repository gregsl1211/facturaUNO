<!DOCTYPE html>
<html lang="en">

<head>
  <title>Clientes</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />

  <link rel="shortcut icon" href="../../resources/images/uno_logo.png" type="image/x-icon">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center p-5">
      <div class="col-sm-6">
        <img src="../../resources/images/client.png" width="90">
        <h5>Reporte de clientes</h5>
        <hr />
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombres</th>
              <th>Email</th>
              <th>Edad</th>
              <th>Dirección</th>
            </tr>
          </thead>
          <tbody id="tbody"></tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="../JS/client.js"></script>

</body>

</html>