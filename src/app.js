
/* llama al boton  */
const boton = document.querySelector('#boton');

/* llama al menu */
const menu = document.querySelector('#menu');

/* evento para menu */
boton.addEventListener('click', () => {
   
    /* agrega o quita el menu */
    menu.classList.toggle('hidden')

})