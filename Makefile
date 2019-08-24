build:
	docker-compose build

start:
	docker-compose up -d

exec:
	docker-compose exec app /bin/bash

stop:
	docker-compose stop

restart:
	@make -s stop
	@make -s start

clean:
	docker system prune --volumes --force

mysql:
	docker-compose exec mysql mysql -p
