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

You can now access the server at http://localhost:8000

You can store the api you want to fetch it by sending the api and its schema  http://127.0.0.1:8000/api/apis
![image](https://user-images.githubusercontent.com/76254252/188672613-62d74205-74aa-4869-855d-10d586d5d2ff.png)
