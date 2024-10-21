install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app tests

validate:
	composer validate

test:
	composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
