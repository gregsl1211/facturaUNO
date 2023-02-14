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
        <h5>Registro de productos</h5>
        <hr />
        <form action ="javascript:void(0);" onsubmit="product.insertProducts()">
          <input type="hidden" id="id" />
          <label>Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Aceite X" autofocus required />
          <label>Descripción</label>
          <input type="text" class="form-control" id="descripcion" placeholder="Aceite para motocicletas" required />
          <label>Precio de Compra</label>
          <input type="number" class="form-control" id="precio_compra" placeholder="500" required />
          <label>Precio de Venta</label>
          <input type="number" class="form-control" id="precio_venta" placeholder="1000" required />
          <label>Tasa de Impuesto</label>
          <input type="number" class="form-control" id="tasa_impuesto" placeholder="18" required />
          <br />
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>               
      </div>
    </div>
  </div>

  <script src="../JS/product.js"></script>

</body>

</html>