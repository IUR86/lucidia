#!/bin/bash

docker-compose up -d
docker-compose exec amazon-linux sh -c "cd src && npm run dev"