
test: 
	@"./vendor/bin/phpunit" -c tests/phpunit.xml
	
test-cov-cli:
	@"./vendor/bin/phpunit" -c tests/phpunit.xml --coverage-text

test-cov-html:
	@"./vendor/bin/phpunit" -c tests/phpunit.xml --coverage-html reports
