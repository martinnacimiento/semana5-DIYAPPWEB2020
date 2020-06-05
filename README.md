# Semana 5 - Laravim

Inspirado en el framework Laravel les presento a Laravim.

# Sobre el proyecto
Esta preparado todo para ejecutarse en contenedores Docker, pero si prefiere otro entorno de desarrolla es necesario ponerlo en el *document root* correspondiente.
En el directorio `utils/` se encuentra el script sql para generar la base de datos en MySQL.
El proyecto fue inspirado en la estructura de directorios de Laravel, y cuenta con un flujo similar al de Laravel.
Consiste en un punto de entrada en el archivo `html/index.php`. El enrutador `app/Kernel/Router.php` se encarga de mapear las uris con los controladores que se encuentran en `app/controllers/`.
Las clases que manejan la capa de datos se encuentran en `app/`.
Para las vistas todo se encuentra en `views/` donde `layout.php` es el contenedor de las vistas que se iran insertado segun la uri o ruta que pida.
Y por ultimo, hay un handler o middleware en `app/handlers/` que se encarga de la autenticacion y autorizacion del usuario a los recursos del proyecto.

# Para ejecutar en docker
Debe tener instalado docker y docker-compose, con ello puede ejecutar `docker-compose up` y en el navegador poner `localhost` para usar el proyecto.
