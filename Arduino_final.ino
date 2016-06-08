//Variables

//Ventilador y sensor de temperatura
int Sensor = 0 ;            // Pin analogico que lee la temperatura
int umbral = 25 ;           // Temparatura para encender el ventilador
const int control = 9 ;     // Pin digital al que esta conectado el ventilador
boolean ventiladorAutomatico;

//Led
const int led = 13 ;        // Pin digital al que esta conectado el led

//Motor
const int motorPin1 = 4;    // pin 1 digital motor
const int motorPin2 = 5;    // pin 2 digital motor
const int motorPin3 = 6;    // pin 3 digital motor
const int motorPin4 = 7;    // pin 4 digital motor

int steps_left = 4095;
boolean Direction;
int Steps = 0;

int Paso [ 8 ][ 4 ] =
{ {1, 0, 0, 0},
  {1, 1, 0, 0},
  {0, 1, 0, 0},
  {0, 1, 1, 0},
  {0, 0, 1, 0},
  {0, 0, 1, 1},
  {0, 0, 0, 1},
  {1, 0, 0, 1}
};

void setup() {
  Serial.begin(9600);         //Puerto usb
  pinMode(led, OUTPUT);       //Pin de conexión para el led
  pinMode(control,  OUTPUT) ; //Pin de conexión para el ventilador
  pinMode(motorPin1, OUTPUT); //Pin de conexión para el motor
  pinMode(motorPin2, OUTPUT); //Pin de conexión para el motor
  pinMode(motorPin3, OUTPUT); //Pin de conexión para el motor
  pinMode(motorPin4, OUTPUT); //Pin de conexión para el motor
}

// the loop function runs over and over again forever
void loop() {
  //Sensor de temperatura
  int lectura = analogRead(Sensor);
  float voltaje = 5.0 / 1024 * lectura ;
  float temp = voltaje * 100 - 3 ;
  Serial.println(temp);
  //Si la temperatura es mayor que la que indiquemos en la variable umbral se enciende el ventilador, si es menor permanece apagado
  if ((temp > umbral) && (ventiladorAutomatico == true)) {
    digitalWrite(control, HIGH);
  }
  if ((temp < umbral) && (ventiladorAutomatico == true)) {
    digitalWrite(control, LOW);
  }
  

  // Si se envia algo mediante el puerto usb...
  if (Serial.available()) {
    char c = Serial.read();
    switch (c) {
      //Si el valor que recive mediante el puerto usb es H encenderemos el led conectado al pin 13
      case 'H':
        digitalWrite(led, HIGH);
        break;
      //Si el valor que recive mediante el puerto usb es L apagaremos el led conectado al pin 13
      case 'L':
        digitalWrite(led, LOW);
        break;
      case 'E': //Encender ventilador
        digitalWrite(control, HIGH);
        ventiladorAutomatico = false;
        break;
      case 'A': //Apagar ventilador
        digitalWrite(control, LOW);
        ventiladorAutomatico = false;
        break;
      case 'V': //Poner el ventilador en modo automatico
        digitalWrite(control, LOW);
        ventiladorAutomatico = true;
        break;
      case 'O': // El motor gira hacia la izquierda
        steps_left = 4095;
        Direction = false;
        while (steps_left>0) {
          stepper();
          steps_left--;
          delay (1) ;
        }
        break;
      case 'C': //El motor gira hacia la derecha
        steps_left = 4095;
        Direction = true;
        while (steps_left>0){
               stepper();
               steps_left--;
               delay (1) ;
        }
        break;
      default:
        printf("Orden incorrecta");
        break;
    }
  }

}

//Metodos para girar el motor
void stepper(){            //Avanza un paso
  digitalWrite( motorPin1, Paso[Steps][ 0] );
  digitalWrite( motorPin2, Paso[Steps][ 1] );
  digitalWrite( motorPin3, Paso[Steps][ 2] );
  digitalWrite( motorPin4, Paso[Steps][ 3] );

  SetDirection();
}

void SetDirection(){
  if (Direction) //Si la variable Direction es "true" el motor avanza hacia la derecha
    Steps++;
  else           //Si la variable Direction es "false" el motor avanza hacia la izquierda
    Steps--;

  Steps = ( Steps + 7 ) % 7 ;
}


