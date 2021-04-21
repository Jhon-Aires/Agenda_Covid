let formularioCi = document.getElementById('formularioCi');
let buttonEliminar = document.getElementById('submitEliminar')
const idInput = document.getElementById('idInput');
let respuesta = document.getElementById('respuesta');

let formIsValid = {
  idInput: false
}

function eliminar() {

  let datos = new FormData(formularioCi);
  console.log(datos.get('id'))

  axios({
    method: 'POST',
    url: 'http://localhost/progweb/agenda_covid/back/product/borrar.php',
    data: {
      id: datos.get('id')
    }
  }).then(response => {
    this.id
    console.log(response.data);
    respuestaSrvr = response.data.eliminado;

    if (respuestaSrvr === true) {
      respuesta.innerHTML = `
      <div class="alert alert-primary" role="alert">
        Agenda eliminada.
      </div>`;
    } else if (respuestaSrvr === false) {
      respuesta.innerHTML = `
      <div class="alert alert-primary" role="alert">
        Agenda no existente.
      </div>`;
    }
  })

}

idInput.addEventListener('keyup', function (e) {
  if (e.target.value.trim().length > 7 && e.target.value.trim().length < 9) {
    formIsValid.idInput = true;
    buttonEliminar.removeAttribute('disabled')
  } else {
    buttonEliminar.setAttribute('disabled', true)
  }
})