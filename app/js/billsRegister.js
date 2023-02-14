const bills = new (function () {
  this.tbody = document.getElementById("tbody");
  this.factBody = document.getElementById("factBody");
  this.selectClient = document.getElementById("selectClient");
  this.selectProd = document.getElementById("selectProd");
  this.precio_venta = document.getElementById("precio_venta");
  this.tasa_impuesto = document.getElementById("tasa_impuesto");
  this.cantidad = document.getElementById("cantidad");
  this.id_producto = document.getElementById("id_producto");
  this.addProd = document.getElementById("addProd");
  const prodArray = [];


  addProd.addEventListener('click', async function () {
    prodArray.push(await getProductData());
    bills.getBillInProgress();
  });

  //Currently working this out
  async function getProductData() {
    let form = new FormData();
    const id_producto = this.selectProd.value
    form.append("id_producto", id_producto);

    const [prodData] = await fetch("../controllers/getProductsByIdController.php", {
      method: "POST",
      body: form,
    }).then((res) => res.json())
      .then((data) => {
        return data
      })
      .catch((error) => console.log(error));

    const producto = {
      id_producto: this.selectProd.value,
      descripcion: prodData.descripcion,
      precio: Number(prodData.precio_venta),
      cantidad: this.cantidad.value,
      tasa_impuesto: Number(prodData.tasa_impuesto)
    }
    return producto
  }

  this.getClientsSelect = () => {
    fetch("../controllers/getAllClientsController.php")
      .then((res) => res.json())
      .then((data) => {
        data.forEach((item) => {
          this.selectClient.innerHTML += `          
              <option value="${item.id_cliente}" >${item.nombres}</option>                        
          `;
        });
      })
      .catch((error) => console.log(error));
  };

  this.getProdSelect = () => {
    fetch("../controllers/getAllProductController.php")
      .then((res) => res.json())
      .then((data) => {
        data.forEach((item) => {
          this.selectProd.innerHTML += `          
              <option value="${item.id_producto}" >${item.descripcion}</option>                        
          `;
        });
      })
      .catch((error) => console.log(error));
  };


  this.getBillInProgress = () => {
    this.factBody.innerHTML = "";
    prodArray.forEach((item) => {
      const impuesto = (item.tasa_impuesto / 100) * item.precio
      const precio_final = impuesto + item.precio;
      this.factBody.innerHTML += `
            <tr>
              <td>${item.id_producto}</td>
              <td>${item.descripcion}</td>
              <td>${item.cantidad}</td>
              <td>${precio_final}</td>
              <td>${precio_final * item.cantidad}</td>
            </tr>
          `;
    });
  };

  this.insertBills = async () => {
    let formEnc = new FormData();
    let formDet = new FormData();
    let totalFact = 0;
    let totalImpFact = 0;
    const factDetArray = [];
    prodArray.forEach((item) => {
      const impuesto = (item.tasa_impuesto / 100) * item.precio
      const precio_final = impuesto + item.precio;
      const totalProd = item.precio * item.cantidad;
      const totalImpProd = precio_final * item.cantidad;
      factDetArray.push({
        id_producto: item.id_producto,
        cantidad: item.cantidad,
        totalProd: totalProd,
        totalImpProd: totalImpProd
      })
      totalFact = totalFact + totalProd
      totalImpFact = totalImpFact + totalImpProd
    });

    formEnc.append("id_cliente", this.selectClient.value);
    formEnc.append("monto_total", totalFact);
    formEnc.append("monto_impuesto_total", totalImpFact);
    const idFactEnc = await fetch("../controllers/insertBillsEncController.php", {
      method: "POST",
      body: formEnc,
    })
      .then((res) => res.json())
      .then((data) => {
        alert("Creado con exito");
        return data
      })
      .catch((error) => console.log(error));


    factDetArray.forEach((item) => {
      formDet.append("id_factura", idFactEnc);
      formDet.append("id_producto", item.id_producto);
      formDet.append("cantidad", item.cantidad);
      formDet.append("totalProd", item.totalProd);
      formDet.append("totalImpProd", item.totalImpProd);
      fetch("../controllers/insertBillsDetController.php", {
        method: "POST",
        body: formDet,
      })
        .then((res) => res.json())
        .then((data) => {
          return data
        })
        .catch((error) => console.log(error));
    })
  }

})();
bills.getClientsSelect();
bills.getProdSelect();



