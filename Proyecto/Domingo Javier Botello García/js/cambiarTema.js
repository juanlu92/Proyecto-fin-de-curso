function cambiarTema(enlace){
  x = document.getElementById('tema');

  if (window.XMLHttpRequest) {
      // IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET","cambiarTema.php?h="+enlace,true);
  xmlhttp.send();
  x.href="css/"+enlace+".css";
}
