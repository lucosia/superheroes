# superheroes

Welcome to my superheroes database
In order to run de project, please follow these steps:
1- With MySql, create a new database to supress the project
2- Configure a .env file in the project's directory. You can use the "env_example" file in the project's directory as a guide.
3- Create a symbolic link from /storage/app/public/superheroes to /public/storage/superheroes.
4- On a terminal, inside the project's directory, run "php artisan migrate" in order to create the database structure
5- Run "php artisan serve" or so to run the project
