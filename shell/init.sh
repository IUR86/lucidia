#!/bin/bash

docker-compose up -d --build
docker-compose exec amazon-linux chmod -R 755 src/storage src/bootstrap/cache