validate: ## validate composer package
	composer validate
	
lint:	## Check linter 
	composer exec --verbose phpcs -- --standard=PSR12 src bin

install:  ## Install package && set rights to exec games
	composer install
	