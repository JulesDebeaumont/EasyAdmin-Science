# EasyAdmin Science

This repository is a project to experience stuff with the bundle EasyAdmin.
It also uses as a reference for "complexe" forms and filters in EasyAdmin.

### 1_Installation

- Do a `git init`
- Clone the project
- Do a `composer install`


### 2_Configure the Database:

- Log as admin on your localhost/phpmyadmin
- Make a new user for the Symfony4 access
- Copy the .env file
- Paste and rename the second one to .env.local at /
- Add .env.local to gitignore file
- In the .env.local:

*These settings are suggestions, put whatever you want:*  
User: `EasyAdminScience`  
Password: `1234`

- Once done, edit the .env.local you made
- Make sure the database access looks like the following one:

`DATABASE_URL="mysql://EasyAdminScience:1234@127.0.0.1:3306/EasyAdminScience?serverVersion=5.7"`

*If using other Database (aka MariaDB, SQLite etc...), make sure to change the server version!*


### 3_Create the Database:

Run `composer reset`

*This will delete the database if there's one, create a new one depending on the actual entities of the project, apply migrations and load all fixtures.*



### 4_Launch the server:

Do a `symfony serve`

*If you encounter trouble with this command, you may try this one (mostly Windows issue): 
`php -S 127.0.0.1:8000 -t public`

