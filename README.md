# MetropolixServer


#### Final project of Full Stack Development Bootcamp at CodeSpace(Málaga).  
#### Proyecto final Bootcamp Full Stack Development en Codespace (Málaga).

## About this project... / Sobre este proyecto...


SERVER CODE. Web for lovers of good cinema. Movie search engine, filtered sections for the most popular  
and best rated movies, details of each of them with image, video and all the necessary data so that you  
know the film perfectly. For registered users, management of lists of favorite films, views and pending,  
as well as the possibility of adding comments on the films, which will be visible in their details,  
and access to the Metropolix real-time chat to exchange impressions with the rest of the users.  

Service created to respond all queries done by [Client-side](https://en.wikipedia.org/wiki/Client-side#:~:text=Client%2Dside%20refers%20to%20operations,relationship%20in%20a%20computer%20network.)  
(ReactJS in this case) to keep logical standards and efficiency. Manipulating the resources as GET,  
POST and DELETE verbs to handle data, which return a response in JSON Format for a straight forward  
Front-end understanding.

This API is a set of reusable components, so it has been utilised Symfony which is one of the most important  
web application frameworks in PHP. Being an open source to everyone and able to  
build robust applications in an expresive context.


CÓDIGO DE SERVIDOR. Web para amantes del buen cine. Buscador de películas,  
apartados filtrados para las películas más populares y mejor valoradas,  
detalle de cada una de ellas con imagen, vídeo y todos los datos necesarios  
para que conozcas la película a la perfección. Para usuarios registrados,  
gestión de listas de películas favoritas, vistas y pendientes, así como la  
posibilidad de añadir comentarios sobre las películas, que serán visibles en sus datos,  
y acceso al chat en tiempo real de Metropolix para intercambiar impresiones con el resto  
de los usuarios.

Servicio creado para responder a todas las consultas realizadas por  
[Client-side] (https://en.wikipedia.org/wiki/Client-side#:~:text=Client%2Dside%20refers%20to%20operations,  
relationship%20in%20a % 20computadora% 20red.)(ReactJS en este caso) para mantener  
los estándares lógicos y la eficiencia. Manipulando los recursos como GET,
POST y DELETE para manejar datos, que devuelven una respuesta en formato JSON para una sencilla
comprensión inicial.

Esta API es un conjunto de componentes reutilizables, por lo que se ha utilizado Symfony, que es uno de los más importantes
frameworks de aplicaciones web en PHP. Pretende ser una fuente abierta para todos y capaz de
construir aplicaciones robustas en un contexto expresivo.

## Starting / Comenzando 🚀

##### * Note that you should have installed PHP ^7.2.5 and composer to proceed with steps below
* Clone the project to your local directory: 
* $git clone https://github.com/Manuel-M-M/MetropolixServer.git
* $cd MetropolixServer/metropolix  
* $composer install   
* Create database: php bin/console doctrine:database:create 
* Import file: .sql php bin/console doctrine:database:import resources/sql/metropolix_db.sql
* In the .env file configure the database connection data and other necessary variables
* In the .env file in DATABASE_URL enter your username and password and the name of the db if you change it
* In the MoviesController.php file you need to use your own tmdb (the movie database) api key in order to get movies

##### *  Ten en cuenta que debes tener instalado PHP ^7.2.5 y composer para seguir los siguientes pasos
* Clonar repo: 
* $git clone https://github.com/Manuel-M-M/MetropolixServer.git
* $cd MetropolixServer/metropolix 
* $composer install    
* Crear base de datos: php bin/console doctrine:database:create 
* Importar archivo: .sql php bin/console doctrine:database:import resources/sql/metropolix_db.sql
* En el archivo .env configurar los datos de conexión a base de datos y otras variables necesarias
* En el archivo .env en DATABASE_URL introduce tu usuario y contraseña y el nombre de la db si lo cambias
* En el archivo MoviesController.php tienes que usar tu propia api key de tmdb (the movie database) para poder hacer el get de las películas

## Built with / Construido con 🛠️

PHP, SYMFONY, DOCTRINE, MYSQL

- [PHP](https://www.php.net/) - Programming language / Lenguaje de programación 
- [SYMFONY](https://symfony.com/) - The framework used / El framework usado
- [DOCTRINE](https://www.doctrine-project.org/) - Used to manage the database / Usado para manejar la base de datos
- [MYSQL](https://www.mysql.com/) - Database / Base de datos

## Author / Autor ✒️

 Manuel Moraga Molina

⌨️ with / con ❤️ by / por [Manuel-M-M](https://github.com/Manuel-M-M) 😊

