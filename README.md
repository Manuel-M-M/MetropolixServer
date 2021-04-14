# MetropolixServer

```
#### Final project of Full Stack Development Bootcamp at CodeSpace(Málaga).  
### Proyecto final Bootcamp Full Stack Development en COdespace (Málaga).

## About this project... / Sobre este proyecto...
```
SERVER CODE. Web for lovers of good cinema. Movie search engine, filtered sections for the most popular  
and best rated movies, details of each of them with image, video and all the necessary data so that you  
know the film perfectly. For registered users, management of lists of favorite films, views and pending,  
as well as the possibility of adding comments on the films, which will be visible in their details,  
and access to the Metropolix real-time chat to exchange impressions with the rest of the users.
```
```
CÓDIGO DE SERVIDOR. Web para amantes del buen cine. Buscador de películas,  
apartados filtrados para las películas más populares y mejor valoradas,  
detalle de cada una de ellas con imagen, vídeo y todos los datos necesarios  
para que conozcas la película a la perfección. Para usuarios registrados,  
gestión de listas de películas favoritas, vistas y pendientes, así como la  
posibilidad de añadir comentarios sobre las películas, que serán visibles en sus datos,  
y acceso al chat en tiempo real de Metropolix para intercambiar impresiones con el resto  
de los usuarios. 
```

## Starting / Comenzando 🚀

```
1. Clone repo: git clone https://github.com/Manuel-M-M/MetropolixServer.git  
2. Run composer install to install the components. 
3. In the .env file, configure the database connection data and other necessary variables.  
4. Create database: php bin/console doctrine:database:create 
5. Import file: .sql php bin/console doctrine:database:import resources/sql/metropolix_db.sql
6. In the .env file in DATABASE_URL enter your username and password and the name of the db if you change it
7. In the MoviesController.php file you need to use your own tmdb (the movie database) api key in order to get the movies.
```
```
See Deployment to know how to deploy the project. 
```
```
1. Clonar repo: git clone https://github.com/Manuel-M-M/MetropolixServer.git  
2. Ejecutar composer install para instalar los componentes.  
3. En el archivo .env configurar los datos de conexión a base de datos y otras variables necesarias.  
4. Crear base de datos: php bin/console doctrine:database:create 
5. Importar archivo: .sql php bin/console doctrine:database:import resources/sql/metropolix_db.sql
6. En el archivo .env en DATABASE_URL introduce tu usuario y contraseña y el nombre de la db si lo cambias
7. En el archivo MoviesController.php tienes que usar tu propia api key de tmdb (the movie database) para poder hacer el get de las películas
```
```
Mira Despliegue para conocer como desplegar el proyecto.
```

## Deployment / Despliegue 📦


## Built with / Construido con 🛠️

```
PHP, SYMFONY, DOCTRINE, MYSQL
```
```
- [PHP](https://www.php.net/) - Programming language / Lenguaje de programación 
- [SYMFONY](https://symfony.com/) - The framework used / El framework usado
- [DOCTRINE](https://www.doctrine-project.org/) - Used to manage the database / Usado para manejar la base de datos
- [MYSQL](https://www.mysql.com/) - Database / Base de datos
```

## Author / Autor ✒️

```
- Manuel Moraga Molina
``` 

---
```
⌨️ with / con ❤️ by / por [Manuel-M-M](https://github.com/Manuel-M-M) 😊
```
