const client = new (function () {
  this.tbody = document.getElementById("tbody");
  this.id = document.getElementById("id");
  this.nombres = document.getElementById("nombres");
  this.email = document.getElementById("email");
  this.edad = document.getElementById("edad");
  this.direccion = document.getElementById("direccion");



  this.getClients = () => {
    fetch("../controllers/getAllClientsController.php")
      .then((res) => res.json())
      .then((data) => {
        this.tbody.innerHTML = "";
        data.forEach((item) => {
          this.tbody.innerHTML += `
            <tr>
              <td>${item.id_cliente}</td>
              <td>${item.nombres}</td>
              <td>${item.email}</td>
              <td>${item.edad}</td>
              <td>${item.direccion}</td>
            </tr>
          `;
        });
      })
      .catch((error) => console.log(error));
  };

 

  this.insertClients = () => {
    let form = new FormData();
    form.append("nombres", this.nombres.value);
    form.append("email", this.email.value);
    form.append("edad", this.edad.value);
    form.append("direccion", this.direccion.value);

    fetch("../controllers/insertClientController.php", {
      method: "POST",
      body: form,
    })
      .then((res) => res.json())
      .then((data) => {
        alert("Creado con exito");
        this.getClients();
      })
      .catch((error) => console.log(error));
  };
})();
client.getClients();
