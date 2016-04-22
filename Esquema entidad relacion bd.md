# Proyecto-fin-de-curso

Base de datos:

Tablas: usuarios, casas, habitaciones, componentes

Los usuarios poseen casas
Las habitaciones tienen componentes

Relaciones:

usuarios 1,N -> poseen -> Casas 1,N               
relación (N,M)   Se crea una nueva tabla llamada poseen con las claves primarias de la tabla usuarios y casas más los atributos que contenga la relación.

usuarios 1,1 -> agregan -> familiares 1,N
relacion (1,N) La clave primaria de usuarios pasa a ser foranea en la tabla familiares y los atributos que contenga la relación.

familiares 1,N -> manejan -> componentes 1,N
relacion (N,M) Se crea la tabla manejan que contendra las claves primarias de familiares y componentes mas los atributos que contenga la relación.

casas 1,1 -> tienen -> habitaciones 1,N           
relación (1,N)   La clave primaria de casa pasa a ser foranea en la tabla habitaciones y los atributos que contenga la relación.

habitaciones 1,1-> contienen -> componentes 1,N     
relación (1,N)   Se crea una tabla nueva llamada tienen con las claves primarias de la tabla habitaciones y componentes.

componentes 1,N -> tienen -> propiedades 1,N
relacion (N,M) Se crea la tabla tienen que contendra las claves primarias de componentes y propiedades mas los atributos que contenga la relación.

-----------------------------------------Tablas definitivas-----------------------------------------

usuarios: id_usuario, nombre, apellido1, apellido2, estado,

familiares: id_familiar, id_usuario, numero_familiar, nombre, apellido1, apellido2, estado

manejan: id_familiar, id_componente, id_casa, id_habitacion

poseen: id_usuario, id_casa, ¿fecha_compra?

casas: id_casa,  nombre, numero_habitaciones

habitacion: id_habitacion, id_casa, nombre

contiene: id_habitacion, id_componente

componentes: id_componente, id_casa, id_habitacion, voltaje, estado

tienen: id_componente, id_propiedad

propiedades: id_propiedad, nombre, tipo


-----------------------------------------Creación de clases-----------------------------------------

Usuarios: id_usuario, nombre, apellido1, apellido2, estado, dni, correoelectronico, correo_alternativo

Familiares: Hereda de Usuarios, numero_familiar

Casas: id_casa,  nombre, numero_habitaciones, habitacion(Objeto habitacion), dirección

bd: 

Habitacion: id_habitacion, nombre, componentes(Obejeto componentes)

Componentes: id_componente, id_propiedad, nombre, tipo

Persiana hereda de Componentes

Sensor hereda de Componentes

Aire Acondicionado hereda de Componentes


-----------------------------------------Metodos de Clases-----------------------------------------

