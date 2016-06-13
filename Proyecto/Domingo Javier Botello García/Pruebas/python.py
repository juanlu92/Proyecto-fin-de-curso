import serial
 
arduino = serial.Serial('/dev/ttyACM0', 9600)
 
print("Starting!")
 
while True:
      comando = "" #Input
      arduino.write(comando) #Mandar un comando hacia Arduino
      if comando == 'D':
            print('LED ENCENDIDO')
      elif comando == 'I':
            print('LED APAGADO')
 
arduino.close() #Finalizamos la comunicacion
