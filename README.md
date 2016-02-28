# Recipe App

A website for collecting recipes

## Installation
    
Must have Docker installed, first clone repo and enter it, all proceeding commands will be run from the cloned dir. 
Build the docker containers provided:

    docker build -t recipes/php images/php
    docker build -t recipes/nginx images/nginx
    
Once the containers are built, use docker-compose to get all the containers running and linked. Then run composer, 
copy the provided config/app.default.php to config/app.php and run migrations:

    docker-compose up -d
    docker-compose run php composer install -d /var/www
    cp config/app.default.php config/app.php
    docker-compose run php /var/www/bin/cake migrations migrate
    
Figure out the IP of the web container and add it to your local machine hosts file as:

    WEB_CONTAINER_IP recipes.dev
    
You can then access the site from http://recipes.dev:8080/ (provided your `docker-compose up` command didn't detect a
conflict on port 8080, if it did check which port it exposed).
