window.addEventListener('DOMContentLoaded', () => {
  const queryString = window.location.search
  const urlParams = new URLSearchParams(queryString)

  let errors = urlParams.get('errors')
  if (errors) {
    errors = JSON.parse(errors)
    for (const key in errors) {
      const inputElt = document.querySelector('input[name=' + key + ']')
      if (inputElt) {
        const errorElt = document.createElement('p')
        errorElt.classList.add('error')
        errorElt.innerText = errors[key]
        inputElt.parentNode.appendChild(errorElt)
      }
    }
  }

  let formData = urlParams.get('formdata')
  if (formData) {
    formData = JSON.parse(formData)
    for (const key in formData) {
      const inputElt = document.querySelector('input[name=' + key + ']')
      if (inputElt) {
        inputElt.value = formData[key]
      }
    }
  }
})
