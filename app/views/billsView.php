<!DOCTYPE html>
<html lang="en">



<head>
  <title>Facturar</title>

  <link rel="shortcut icon" href="../../resources/images/uno_logo.png" type="image/x-icon">

</head>

<body>
  <div class="container">
    <div class="row justify-content-center p-5">
      <div class="col-sm-6">
        <img src="../../resources/images/bills.png" width="90">
        <h3>Generar de Facturas</h3>
        <hr />
        <form action="javascript:void(0);" onsubmit="bills.insertBills()">
          <label>Cliente: </label>
          <select name="selectClient" id="selectClient">
          </select>

          <label>Producto:</label>
          <select name="selectProd" id="selectProd" class="form-control">
          </select>
          <label>Cantidad:</label>
          <input type="number" id="cantidad" placeholder="" min="1">
          <button type="button" id="addProd">Agregar a la factura</button>

          <div>
            <div>
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="factBody">
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="../js/billsRegister.js"></script>


</body>

</html>
