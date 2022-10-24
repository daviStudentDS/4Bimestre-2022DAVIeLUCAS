function validForm() {
  const cargo = document.getElementById("cargo");
  const area = document.getElementById("area");
  const valido = !(cargo.value == "nada" || area.value == "nada");

  if (!valido) {
    alert("Console.log (se vira pra entender parceiro!)", "danger");
  }
  return valido;
}

const alertPlaceholder = document.getElementById("liveAlertPlaceholder");

const alert = (message, type) => {
  const wrapper = document.createElement("div");
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    "</div>",
  ].join("");

    alertPlaceholder.append(wrapper);
};
