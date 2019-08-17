@PHONY: install
install: git-hooks composer-install

@PHONY: composer-install
composer-install:
	@echo "\n=== Installing dependencies ===\n"
	composer install

@PHONY: codestyle
codestyle:
	@echo "\n=== Checking codestyle ===\n"
	vendor/bin/ecs check src --config dev/ecs/config.yml

@PHONY: codestyle-fix
codestyle-fix:
	@echo "\n=== Fixing codestyle ===\n"
	vendor/bin/ecs check src --config dev/ecs/config.yml --fix

@PHONY: git-hooks
git-hooks: .git/hooks/pre-commit

@PHONY: run
run:
	php start.php

.git/hooks/pre-commit:
	@echo "\n=== Installing Git hooks ===\n"
	rm -f .git/hooks/*.sample
	cp dev/git-hooks/pre-commit .git/hooks/pre-commit
	chmod +x .git/hooks/pre-commit
