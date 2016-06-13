//FORMULARIOS
$(document).ready(function() {
  $('.form-horizontal').submit(function() {
// Enviamos el formulario usando AJAX
     $.ajax({
         type: 'POST',
         url: $(this).attr('action'),
         data: $(this).serialize(),
         // Mostramos un mensaje con la respuesta de PHP
         success: function(data) {
             $('#todo').html(data);
         }
     })
     return false;
 });
})
//FILTRO
function filtrar(str) {
    if (str == "") {
      //Borramos todo en la etiqueta AJAX
        document.getElementById("todo").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            //Si todo es correcto realizame la respuesta
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("todo").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajaxPlano.php?q="+str,true);
        xmlhttp.send();
    }
}
//BUSCAR
$(document).ready(function(){
    var consulta;
    //Focus al campo de búsqueda
    $("#busqueda").focus();
    //Comprobamos si se pulsa una tecla
    $("#busqueda").keyup(function(e){

    //Obtenemos el texto introducido
    consulta = $("#busqueda").val();

    $.ajax({
      type: "POST",
      url: "ajaxBuscar.php",
      data: "b="+consulta,
      dataType: "html",
      beforeSend: function(){
      },
      error: function(){
        alert("error petición ajax");
      },
      //Vacía y añade
      success: function(data){
          $("#todo").empty();
          $("#todo").append(data);
      }
    });
    });
});
