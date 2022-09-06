# Orcas-Task

# Getting started

## Installation

Clone the repository

    git clone https://github.com/ramo772/orcas-task

Switch to the repo folder

    cd orcas-task
    
Install all the dependencies 

    composer install


Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate



Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve
    
Running The Scheduler Locally (the data will be fetched every 8 hours)

    php artisan schedule:work

In the  terminal paste this code 

     php artisan passport:install 


You can now access the server at http://localhost:8000

You can store the api you want to fetch it by sending the api and its schema  http://127.0.0.1:8000/api/apis

    ![image](https://user-images.githubusercontent.com/76254252/188672613-62d74205-74aa-4869-855d-10d586d5d2ff.png)

The data will be fetched every 8 hours if you want to fetch it and store the to db just use this endpoint http://127.0.0.1:8000/api/apis

    ![image](https://user-images.githubusercontent.com/76254252/188673542-b1ffa305-5000-4e3d-b95c-c849998a6544.png)

You can get a list of 10 users per page by 2 ways access the local server and register a new admin 

    ![image](https://user-images.githubusercontent.com/76254252/188674196-7778c396-e0c7-42f6-a9a3-5fa03c67d31c.png)

    ![image](https://user-images.githubusercontent.com/76254252/188674536-f87d009c-b584-4673-ab04-e48f4c86746a.png)

OR use the auth endpoints then add the token and use this endpoint to get list of users http://127.0.0.1:8000/api/user

   ![image](https://user-images.githubusercontent.com/76254252/188675182-4c9e3d63-8062-448a-b405-e155d671dadb.png)


Searching endpoint http://127.0.0.1:8000/api/search

    ![image](https://user-images.githubusercontent.com/76254252/188676037-03556ef5-a0ca-404b-9003-51088f87a57c.png) 




