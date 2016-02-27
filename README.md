# Recipe App

A website for collecting recipes

## Installation
    
Must have Docker installed, simply clone repo and run:

    composer update
    docker-compose up

Connect to the php docker container (kitematic is the easiest way to access it, otherwise reference how to access it 
from command line) and run the following from the /var/www dir:

    bin/cake migrations migrate
    
Kitematic will have a link to the nginx server's IP, add that to your hosts file associated with `recipes.dev`, you will
then be able to access the site from: http://recipes.dev:8080/

