# Recipe App

A website for collecting recipes

## Installation
    
Must have Docker installed, simply clone repo and run:

    docker-compose up -d
    docker-compose run php composer install -d /var/www
    docker-compose run php /var/www/bin/cake migrations migrate
    
Figure out the IP of the web container and add it to your local machine hosts file as:

    WEB_CONTAINER_IP recipes.dev
    
You can then access the site from http://recipes.dev:8080/ (provided your `docker-compose up` command didn't detect a
conflict on port 8080, if it did check which port it exposed).
