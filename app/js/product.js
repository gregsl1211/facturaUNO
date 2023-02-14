const product = new (function () {
  this.tbody = document.getElementById("tbody");
  this.id = document.getElementById("id");
  this.nombre = document.getElementById("nombre");
  this.descripcion = document.getElementById("descripcion");
  this.precio_compra = document.getElementById("precio_compra");
  this.precio_venta = document.getElementById("precio_venta");
  this.tasa_impuesto = document.getElementById("tasa_impuesto");



  this.getProducts = () => {
    fetch("../controllers/getAllProductController.php")
      .then((res) => res.json())
      .then((data) => {
        this.tbody.innerHTML = "";
        data.forEach((item) => {
          $impuesto = (item.tasa_impuesto / 100) * item.precio_venta
          $precio_final = $impuesto + item.precio_venta;
          this.tbody.innerHTML += `
            <tr>
              <td>${item.id_producto}</td>
              <td>${item.nombre}</td>
              <td>${item.descripcion}</td>
              <td>${item.precio_compra}</td>
              <td>${item.precio_venta}</td>
              <td>${$impuesto}</td>
              <td>${$precio_final}</td>
            </tr>
          `;
        });
      })
      .catch((error) => console.log(error));
  };
  this.insertProducts = () => {
    let form = new FormData();
    form.append("nombre", this.nombre.value);
    form.append("descripcion", this.descripcion.value);
    form.append("precio_compra", this.precio_compra.value);
    form.append("precio_venta", this.precio_venta.value);
    form.append("tasa_impuesto", this.tasa_impuesto.value);


    fetch("../controllers/insertProductController.php", {
      method: "POST",
      body: form,
    })
      .then((res) => res.json())
      .then((data) => {
        alert("Creado con exito");
        this.getProducts();
      })
      .catch((error) => console.log(error));
  };
})();
product.getProducts();
