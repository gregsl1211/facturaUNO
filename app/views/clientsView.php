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
        <h5>Registro de clientes</h5>
        <hr />
        <form action ="javascript:void(0);" onsubmit="client.insertClients()">
          <input type="hidden" id="id" />
          <label>Nombres</label>
          <input type="text" class="form-control" id="nombres" placeholder="Nombres Apellidos" autofocus required />
          <label>Email</label>
          <input type="email" class="form-control" id="email" placeholder="Ejemplo@email.com" required />
          <label>Edad</label>
          <input type="number" class="form-control" id="edad" placeholder="18" min="18" max="99" required />
          <label>Dirección</label>
          <input type="text" class="form-control" id="direccion" placeholder="Calle Ejemplo #2 , Sector , Ciudad" autofocus required />
          <br />
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        <br />
      </div>
    </div>
  </div>

  <script src="../JS/client.js"></script>

</body>

</html>