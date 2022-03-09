function post_foto_perfil(url) {
  const formulario = document.getElementById("form_foto");

  const formData = new FormData(formulario);
  //  formData.append('file', e.target.value);
  axios({
    method: 'post',
    url: url,
    data: formData,
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
    .then(
      res => {
        let data = res.data
        toastr.success(data.message);
        // document.getElementById("FOTO").value = res.data;
        // console.log(document.getElementById("FOTO").value)
      }
    )
    .catch(
      err => {
        console.log('¡Error de carga!')
      }
    )
}



function insertar_caraceteres(selector_insert, caracter_insert) {
  const element_insert = document.getElementById(selector_insert);

  element_insert.textContent = caracter_insert;
}

function deleteElement(e, url_http, name_element, content_insert) {
  // const url = url_http;
  const id = e.currentTarget.dataset.id

  if (!confirm("estas seguro de querer eliminar este elemento")) return false;

  axios.post(url_http, {
    id: id
  }).then((response) => {
    console.log(response);
    const data = response.data
    const message = data.message;
    const element_remove = document.getElementById(name_element + "-" + id);
    const insert_habilidades = document.getElementById(content_insert);




    if (data.type == "success") {
      toastr.success(message);
      element_remove.parentElement.removeChild(element_remove);

      if (insert_habilidades.childElementCount < 1) {
        insert_habilidades.innerHTML = `<h3 class="p-2 h5 text-secondary">No Hay Habilidades Registradas</h3>`;
      }
    } else {
      toastr.error(message);

    }
  });
}


function activate_resumen(e, url_http, elements_buttons) {
  // const url = url_http;
  const id = e.currentTarget.dataset.id

  // if (!confirm("estas seguro de querer acticar este elemento")) return false;

  axios.post(url_http, {
    id: id
  }).then((response) => {
    // console.log(response);
    const data = response.data
    const message = data.message.message;
    // console.log(data);return;
    if (data.message.type == "success") {
      toastr.success(message);
      for (let i = 0; i < elements_buttons.length; i++) {
        elements_buttons[i].classList.remove("btn-info");
        elements_buttons[i].classList.add("btn-outline-info");
        elements_buttons[i].textContent = "Activar";
        elements_buttons[i].disabled = false;

        if (elements_buttons[i].dataset.id == id) {
          elements_buttons[i].textContent = "Activado";
          elements_buttons[i].disabled = true;
          elements_buttons[i].classList.add("btn-info");
          elements_buttons[i].classList.remove("btn-outline-info");

        }
      }
    } else {
      toastr.error(message);

    }
  });
}


async function update_element(obj_config) {
  const form = document.querySelector(obj_config.form_id);

  for (const key in obj_config.inputs) {
    form[key].value = await obj_config.inputs[key]
    // console.log(form[key])

  }

}