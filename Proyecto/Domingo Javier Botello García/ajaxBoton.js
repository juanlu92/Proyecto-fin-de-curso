function BotonAjax(str){
  /*STR es nuestra etiqueta, firstChild nuestro primer hijo*/
  if(str.getAttribute('class')=='led'){
    if (str.firstChild.getAttribute('class')=='apagado') {
      str.firstChild.setAttribute('class','encendido');
      str.firstChild.setAttribute('src','img/on.png');
      $.ajax({
          url: 'Pruebas/onLed.php',
          success: function(data) {
        }
      });
    }
    else {
      str.firstChild.setAttribute('class','apagado');
      str.firstChild.setAttribute('src','img/off.png');
      $.ajax({
          url: 'Pruebas/offLed.php',
          success: function(data) {
        }
      });
    }
  }
  else if(str.getAttribute('class')=='ventilador'){
    if (str.firstChild.getAttribute('class')=='apagado') {
      str.firstChild.setAttribute('class','encendido');
      str.firstChild.setAttribute('src','img/on.png');
      $.ajax({
          url: 'Pruebas/onVentilador.php',
          success: function(data) {
        }
      });
    }
    else if(str.firstChild.getAttribute('class')=='encendido') {
      str.firstChild.setAttribute('class','auto');
      str.firstChild.setAttribute('src','img/auto.png');
      $.ajax({
          url: 'Pruebas/autoVentilador.php',
          success: function(data) {
        }
      });
    }
    else{
      str.firstChild.setAttribute('class','apagado');
      str.firstChild.setAttribute('src','img/off.png');
      $.ajax({
          url: 'Pruebas/offVentilador.php',
          success: function(data) {
        }
      });
    }
  }
  else if(str.getAttribute('class')=='motor'){
    if (str.firstChild.getAttribute('class')=='apagado') {
      str.firstChild.setAttribute('class','encendido');
      str.firstChild.setAttribute('src','img/on.png');
      $.ajax({
          url: 'Pruebas/onMotor.php',
          success: function(data) {
        }
      });
    }
    else {
      str.firstChild.setAttribute('class','apagado');
      str.firstChild.setAttribute('src','img/off.png');
      $.ajax({
          url: 'Pruebas/offMotor.php',
          success: function(data) {
        }
      });
    }
  }
}
