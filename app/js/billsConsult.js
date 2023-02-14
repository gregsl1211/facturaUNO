const bills = new (function () {
  this.tbody = document.getElementById("tbody");

  this.getBills = () => {
    fetch("../controllers/getAllBillsController.php")
      .then((res) => res.json())
      .then((data) => {
        this.tbody.innerHTML = "";
        data.forEach((item) => {
          this.tbody.innerHTML += `
            <tr>
              <td>${item.id_factura}</td>  
              <td>${item.nombre_cliente}</td>            
              <td>${item.monto}</td>            
              <td>${item.fecha_insercion}</td>            
          
            </tr>
          `;
        });
      })
      .catch((error) => console.log(error));
  };
})();
bills.getBills();


