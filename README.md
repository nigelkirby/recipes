# Recipe App

A website for collecting recipes

## Installation
    
Must have Docker and composer to run, if you don't have composer it is included in the php container, simply clone repo and run:

    docker-compose up -d
    docker-compose run php composer install -d /var/www
    docker-compose run php /var/www/bin/cake migrations migrate
    
Figure out the IP of the web container and add it to your local machine hosts file as:

    IP recipes.dev
    
You can then access the site from http://recipes.dev:8080/ (provided your docker-compose up command didn't detect a
conflict on port 8080, if it did check which port it exposed).
