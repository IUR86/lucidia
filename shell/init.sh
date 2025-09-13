#!/bin/bash

docker-compose up -d --build
docker-compose exec amazon-linux chmod -R 755 src/storage src/bootstrap/cache
docker-compose exec amazon-linux sh -c "cd src && npm install"
docker-compose exec amazon-linux sh -c "cd src && npm add -D sass"