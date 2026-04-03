/** Se agregó setTimeout para el retraso en la aparicion del banner (retraso de 5 seg ) **/
setTimeout(() => (function() {
    "use strict";

    var cookieAlert = document.querySelector(".cookiealert");
    cookieAlert.classList.add("show");

    cookieAlert.offsetHeight;

})(), 5000);
/*** se puede cambiar para reducir o ampliar el retraso  ***/

function cerrar_pop() {
    $('#popup').hide();
}