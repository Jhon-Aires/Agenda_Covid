let valorTotalGrupo = document.getElementById('valorTotalGrupo');
let valorTotalEdad = document.getElementById('totalGruposEdad');
let valorGrupos = document.getElementsByClassName('valoresGrupos');
let valorEdad = document.getElementsByClassName('valoresGruposEdad');

function usuarios() {

  axios({
    method: 'POST',
    url: 'http://localhost/progweb/agenda_covid/back/product/cantidadGrupo.php'
  }).then(response => {
    console.log(response.data);
    personalCti = response.data.PersonalCTI;
    hisopadores = response.data.Hisopadores;
    personalEdu = response.data.PersonalEducacion;
    personalRes = response.data.PersonalResidencia;
    personalSalud = response.data.PersonalSaludGeneral;
    policia = response.data.Policia;
    bomberos = response.data.Bomberos;
    valorTotal = parseInt(personalCti) + parseInt(hisopadores)
      + parseInt(personalEdu) + parseInt(personalRes) + parseInt(personalSalud)
      + parseInt(policia) + parseInt(bomberos);

    valorTotalGrupo.innerHTML = `
    ${valorTotal}
    `;
    valorGrupos[0].innerHTML = `
    ${personalCti}
    `;

    valorGrupos[1].innerHTML = `
    ${hisopadores}
    `;

    valorGrupos[2].innerHTML = `
    ${personalEdu}
    `;

    valorGrupos[3].innerHTML = `
    ${personalRes}
    `;

    valorGrupos[4].innerHTML = `
    ${personalSalud}
    `;

    valorGrupos[5].innerHTML = `
    ${policia}
    `;

    valorGrupos[6].innerHTML = `
    ${bomberos}
    `;
  })

}
function usuariosEdad() {
  axios({
    method: 'POST',
    url: 'http://localhost/progweb/agenda_covid/back/product/grupoEdad.php'
  }).then(response => {
    console.log(response.data);
    let primerEdad = response.data.primerEdad;
    let segundaEdad = response.data.segundaEdad;
    let tercerEdad = response.data.tercerEdad;
    let total = parseInt(primerEdad) + parseInt(segundaEdad)
      + parseInt(tercerEdad);
    valorTotalEdad.innerHTML = `
      ${total}
    `;
    valorEdad[0].innerHTML = `
      ${primerEdad}
    `;
    valorEdad[1].innerHTML = `
      ${segundaEdad}
    `;
    valorEdad[2].innerHTML = `
      ${tercerEdad}
    `;
  })
}