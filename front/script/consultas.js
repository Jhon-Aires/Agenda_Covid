let formularioCi = document.getElementById('formularioCi');
let buttonConsult = document.getElementById('submitConsult')
const idInput = document.getElementById('idInput');
let respuesta = document.getElementById('respuesta');


let formIsValid = {
  idInput: false
}

function consultar() {
  let datos = new FormData(formularioCi);
  console.log(datos.get('id'))

  axios({
    method: 'POST',
    url: 'http://localhost/progweb/agenda_covid/back/product/consulta.php',
    data: {
      id: datos.get('id')
    }
  }).then(response => {
    this.id
    console.log(response.data);
    respuestaSrvr = response.data.consulta.id;
    respuestaSrvrBool = response.data.consulta;

    if (respuestaSrvr === datos.get('id')) {
      respuesta.innerHTML = `
      <div class="alert alert-primary" role="alert">
        Primera Vacuna: ${response.data.consulta.fecha1}
        <hr>
        Segunda Vacuna: ${response.data.consulta.fecha2}
      </div>`;
    } else if (respuestaSrvrBool === false){
      respuesta.innerHTML = `
      <div class="alert alert-primary" role="alert">
        Usted no está agendado
      </div>`;
    }

    
  })
}

idInput.addEventListener('keyup', function (e) {
  if (e.target.value.trim().length > 7 && e.target.value.trim().length < 9) {
    formIsValid.idInput = true;
    buttonConsult.removeAttribute('disabled')
  } else {
    buttonConsult.setAttribute('disabled', true)
  }
})