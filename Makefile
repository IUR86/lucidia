init:
	docker-compose up -d
down:
	docker-compose down
restart:
	docker-compose down && docker-compose up -d
logs:
	docker-compose logs -f

amazon-linux:
	docker-compose exec amazon-linux bash

artisan:
	docker-compose exec app php artisan
migrate:
	docker-compose exec app php artisan migrate
migrate-refresh:
	docker-compose exec app php artisan migrate:refresh --seed
test:
	docker-compose exec app php artisan test

composer-install:
	docker-compose exec app composer install
npm-install:
	docker-compose exec app npm install
npm-dev:
	docker-compose exec app npm run dev
npm-build:
	docker-compose exec app npm run build
