# Metropolix API REST

#### Server for final project of Full Stack Development Bootcamp at CodeSpace(Málaga).  

## About this project... 

SERVER CODE. Web for lovers of good cinema. Movie search engine, filtered sections for the most popular  
and best rated movies, details of each of them with image, video and all the necessary data so that you  
know the film perfectly. For registered users, management of lists of favorite films, views and pending,  
as well as the possibility of adding comments on the films, which will be visible in their details,  
and access to the Metropolix real-time chat with Firebase to exchange impressions with the rest of the users.  

Service created to respond all queries done by [Client-side](https://en.wikipedia.org/wiki/Client-side#:~:text=Client%2Dside%20refers%20to%20operations,relationship%20in%20a%20computer%20network.)  
(ReactJS in this case) to keep logical standards and efficiency. Manipulating the resources as GET,  
POST and DELETE verbs to handle data, which return a response in JSON Format for a straight forward  
Front-end understanding.

This API is a set of reusable components, so it has been utilised Symfony which is one of the most important  
web application frameworks in PHP. Being an open source to everyone and able to  
build robust applications in an expresive context.

## Starting  🚀

##### Note that you should have installed PHP ^7.2.5 and composer to proceed with steps below
* Clone the project to your local directory:
```` 
 $git clone https://github.com/Manuel-M-M/MetropolixServer.git
````
````
 $cd MetropolixServer  
````
````
 $composer install
````
````
 $php -S localhost:8000 -t public/
````  
[PHP local server](https://www.php.net/manual/en/features.commandline.webserver.php)
* Install [JWT Authentication Bundle](https://github.com/lexik/LexikJWTAuthenticationBundle)
* Create database: php bin/console doctrine:database:create 
* Import file: .sql php bin/console doctrine:database:import src/resources/sql/metropolix_db.sql
* In the .env file configure the database connection data and other necessary variables
* In the .env file in DATABASE_URL enter your username and password and the name of the db if you change it

## Security in Back End...

#### 🔒🔒   API security is mission-critical to digital businesses as it is the most-frequent attack vector for enterprise web applications data breaches   🔒🔒

* Security access control has been set up in different paths to restrict any request to the API in users' areas are done by not registered.
* Type Declarations in entities and each controller route, avoiding any data not required is passed on through the DDBB.
* [JWT Authentication Bundle](https://github.com/lexik/LexikJWTAuthenticationBundle) Token authentication system to represent the user in a secure manner,  
configured by you to modify different features as wanted.

## Back End stack...  🛠️

PHP, SYMFONY, DOCTRINE

- [PHP](https://www.php.net/) - Programming language  
- [SYMFONY](https://symfony.com/) - The framework used 
- [DOCTRINE](https://www.doctrine-project.org/) - Used to manage the database 

## How to build the pillars...

[Composer](https://getcomposer.org/) as main application-level package manager in PHP, it's a mandatory use it to shape your project adding dependencies as needed. All available bundles may be found at [packagist.org](https://packagist.org/) from getting started to New contributions.

#### How to use it [here](https://getcomposer.org/doc/01-basic-usage.md)

# Metropolix Database MySQL

#### Database for final project of Full Stack Development Bootcamp at CodeSpace(Málaga). 

## About this project...

Metropolix Database, it has been structured by following normalization process to organise data, creating columns,  
keys and tables to establish relationships between them, gaining full protection in the data used and making the  
database more flexible by eliminating redundancy and inconsistent dependency.

## MySQL Database Schema...
 
[MySQL](https://www.mysql.com/) is the service used to form relationships between tables, in wich you can use relationship types like One-to-One,  
Many-to-One, One-to-Many and Many-to-Many to reach outcome required in each scenario.

##  PHPMyAdmin Support Locally... 

For a better overview of how things are in the Database and support any admin action, I opted for [PHPMyAdmin](https://www.phpmyadmin.net/) which is very handy in these cases as MySQL Database.

## ❗❗ Please note ❗❗

[LAMP](https://en.wikipedia.org/wiki/LAMP_(software_bundle)) is the generic software stack model solution used in my case, but you can use another one to run the DDBB locally. [Download here](https://bitnami.com/stack/lamp/installer)!!

## Author  ✒️

 Manuel Moraga Molina

⌨️ with ❤️ by [Manuel-M-M](https://github.com/Manuel-M-M) 😊

