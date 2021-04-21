let formularioCi = document.getElementById('formularioCi');
let buttonAgend = document.getElementById('submitAgend')
let respuesta = document.getElementById('respuesta');
const idInput = document.getElementById('idInput');

let formIsValid = {
  idInput: false
}

formularioCi.addEventListener('submit', function (e) {
  e.preventDefault();
  let datos = new FormData(formularioCi);
  console.log(datos.get('id'))

  axios({
    method: 'POST',
    url: 'http://localhost/progweb/agenda_covid/back/product/agendar.php',
    data: {
      id: datos.get('id')
    }
  })//res => console.log(res.data)
    .then(response => {
      this.id
      console.log(response.data.agendaCreada);
      respuestaSrvr = response.data.agendaCreada;
      if (respuestaSrvr === "noUser") {
        respuesta.innerHTML = `
        <div class="alert alert-primary" role="alert">
          Usted no está en la lista para vacunarse.
        </div>`;
      } else {
        if (respuestaSrvr === "noTel") {
          respuesta.innerHTML = `
          <div class="alert alert-primary" role="alert">
            <form id="formularioTel">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Ingrese Telefono:</span>
                </div>
                <input type="number" name="telefono" class="form-control" placeholder="ej: 47332112" aria-describedby="basic-addon3" id="telInput">
              </div>
              <button id="submitTel"  onClick="agregarTel()" placeholder="Ej: 099123123" class="btn btn-primary" >registrar</button>
            </form>
          </div>`;
        } else {
          if (respuestaSrvr === true) {
            respuesta.innerHTML = `
            <div class="alert alert-success" role="alert">
              Agendado correctamente.
            </div>`;
          } else {
            if (respuestaSrvr === false) {
              respuesta.innerHTML = `
            <div class="alert alert-success" role="alert">
              Usuario agendado con anteriodidad.
            </div>`;
            } else {
              respuesta.innerHTML = `
              <div class="alert alert-danger" role="alert">
                Error del sistema: Imposible Agendar.
              </div>`;
            }
          }
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    })

})

idInput.addEventListener('keyup', function (e) {
  if (e.target.value.trim().length > 7 && e.target.value.trim().length < 9) {
    formIsValid.idInput = true;

    buttonAgend.removeAttribute('disabled')
  } else {
    buttonAgend.setAttribute('disabled', true)
  }
})

function agregarTel() {
  let formularioTel = document.getElementById('formularioTel');
  formularioTel.addEventListener('submit', function (e) {
    e.preventDefault();
    let alerta = document.getElementById('alerta');
    let inputTel = document.getElementById('telInput');
    let datosId = new FormData(formularioCi);
    let datosTel = new FormData(formularioTel);
    console.log(datosId.get('id'))
    console.log(datosTel.get('telefono'));

    if (inputTel.value.trim().length > 8 && inputTel.value.trim().length < 10) {
      axios({
        method: 'POST',
        url: 'http://localhost/progweb/agenda_covid/back/product/telefono.php',
        data: {
          id: datosId.get('id'),
          telephone: datosTel.get('telefono')
        }
      }).then(response => {
        this.id
        console.log(response.data.telefonoCreado);
        respuestaSrvr = response.data.telefonoCreado;
        if (respuestaSrvr === true) {
          console.log("telefono creado");
          respuesta.innerHTML = `
        <div class="alert alert-success" role="alert">
          Usted no está en la lista para vacunarse.
        </div>`;
          let datos = new FormData(formularioCi);
          axios({
            method: 'POST',
            url: 'http://localhost/progweb/agenda_covid/back/product/agendar.php',
            data: {
              id: datos.get('id')
            }
          }).then(response => {
            console.log(response.data);
            respuestaSrvr = response.data.agendaCreada;
            if (respuestaSrvr === true) {
              respuesta.innerHTML = `
            <div class="alert alert-success" role="alert">
              Usuario Agendado.
            </div>`;
              alerta.innerHTML = ``
              return true;
            } else if (respuestaSrvr === false) {
              respuesta.innerHTML = `
            <div class="alert alert-danger" role="alert">
              Error del sistema.
            </div>`;
              alerta.innerHTML = ``
            }
          })
        }
      })
    } else {
      alerta.innerHTML = `
        <div class="alert alert-danger" role="alert">
          Ingrese un teléfono correcto.
        </div>`;
    }
  })
}
