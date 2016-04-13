# Proyecto-fin-de-curso

Base de datos:

Tablas: usuarios, casas, habitaciones, componentes

Los usuarios poseen casas
Las habitaciones tienen componentes

Relaciones:

usuarios 1,N -> poseen -> Casas 1,N               relación (N,M)   Se crea una nueva tabla llamada poseen con las claves primarias de la tabla usuarios y casas.
casas 1,N -> tienen -> habitaciones 1,1           relación (N,1)   La clave primaria de habitaciones pasa a ser foranea en la tabla casas y los atributos que contenga la relación.
habitaciones 1,N -> tienen -> componentes 1,N     relación (N,M)   Se crea una tabla nueva llamada tienen con las claves primarias de la tabla habitaciones y componentes.



usuarios: id_usuario, nombre, apellido1, apellido2, rol, estado

poseen: id_usuario, id_casa, ¿fecha_compra?

casas: id_casa, id_habitacion

habitacion: id_habitacion 

contiene: id_habitacion, id_componente

componentes: id_componente, voltaje, tipo(motor,sensor,luz), 
