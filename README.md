#  GUIDANCE

## Project short introduction

Monolith app based on technology stack : Laravel 8.*, Mysql, Docker, Vuejs 2.* for a one-fits all legal centre solution: a place, where the user can see all SW(sonarworks) legal documents. 

1. Docker introduction part :

	* 1.1 Database and application entities are located in separate containers (Database layer is added to introduce the work between webserver and db containers and also to introduce laravel and mysql work)
	
	* 1.2 To see which port belongs to webserver container and which port to db container, should open docker-compose.yml
	
	* 1.3 All webserver's and php configurations are located in devops folder
	
	* 1.4 All required connection configurations with database inside docker container are located in .env.example file, which should be renamed on .env file
	
 
## Commands to execute
```sh
docker-compose up --build
```
> Install php packages inside app container
```sh
docker-compose run app composer install
```
> Generate project encryption key inside app container (this command should be executed after composer install)
```sh
docker-compose run app php artisan key:generate
```
> Make migrations inside app container (this command should be executed after composer install)
```sh
docker-compose run app php artisan migrate
```

> Parse documents from sonarworks external resource and save them into DB 
> (this command should be executed after composer install and migration command (php artisan:migrate))
```sh
docker-compose run app php artisan pages:import
```

> Install node modules (front part)
```sh
docker-compose run app php npm install
```

> Run front part with with production flag (this command should be executed after npm install or npm i)
```sh
docker-compose run app php npm run prod
```
