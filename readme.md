Picture os the day 
https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY

Ateroides
https://api.nasa.gov/neo/rest/v1/neo/browse?api_key=DEMO_KEY
creo que es este 
https://api.nasa.gov/neo/rest/v1/feed?start_date=2015-09-07&end_date=2015-09-08&api_key=DEMO_KEY


Trabajas en el departamento de desarrollo de software para la NASA.
Unos investigadores internos necesitan una página web para realizar ciertas tareas de manera más sencilla y se te ha encomendado esta tarea a ti.

A continuación aparecen las especificaciones:

- La página principal deberá poder visualizarse la foto del día (pudiendo escoger el día que se quiera), el texto de la imagen y su título. Además también deberá dejar descargarla a local.

- La página principal deberá de dar datos sobre los asteroides más cercanos de la tierra. Deberá mostrar cuantos se han detectado y cuantos son amenaza. También deberá mostrar los datos: Nombre, diámetro en KM, velocidad en Km/s y distancia de la tierra en distancia lunar de todos los asteroides que sean amenaza.

- La página principal también deberá gestionar las peticiones que se hacen a la API de la NASA. Cuando se hace una petición a la API, en el header del response aparecen las peticiones que quedan para llegar al límite. Deben de mostrarse para que el investigador sepa cuantas le quedan.

- La página principal deberá tener un botón de logout, eso implica tener un login.
- El login deberá de autenticar al usuario y cargar su token de acceso a la API de la NASA en una variable de php.
- Los datos de usuario estarán guardados en un mysql o mariaDB.
- También se permitirá crear cuentas.


Rúbrica proyecto NASA:

Consume correctamente APIs de la NASA y es capaz de mostrar la información requerida recorriendo un JSON 	->		0.5 puntos
Crea un login y funciona correctamente para acceder a la página principal 							->		0.1 puntos
Crea una página para crear una cuenta y funciona correctamente									->		0.1 puntos
Utiliza una BBDD para almacenar los usuarios y los tokens										->		0.3 puntos
Crea un botón para descargar la imagen de la página actual										->		0.1 puntos
Utiliza $_SESSION para almacenar información del usuario en sesión								->		0.2 puntos
Utiliza $_COOKIE para almacenar la información requerida										->		0.2 puntos

																				____________________
																						1.5 puntos


A mayores:

Se valorará positivamente nunca negativamente el estilo utilizado, el esfuerzo a nivel estético y visual		->		0.5 puntos


Aclaración:

La puntuación de esta práctica nunca superará los 1.5 puntos. Los 0.5 puntos de estética nunca se aplicarán si se ha obtenido la puntuación máxima en la rúbrica.

Entrega:

Fecha máxima = 13/12/2024


_________en los metoeritas pones un calendar en htm lso metoeritos, la priemra va al endpoint 

es potencialmente peligroso? 
la cantidad de asteroides
en un div cuantos orvitan , un count y cuales estan a true de los peligrosos
en otro div por cada asteroide que es peligroso y en rojo, diametro en kilometros distancia lunar y velocidad