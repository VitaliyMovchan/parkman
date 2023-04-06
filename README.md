# parkman

Deployment:
1. Run composer-docker up
2. Run composer-docker exec app composer install
3. Run composer-docker exec app php vendor/bin/phoenix migrate
4. Run sql scripts (db\sql\*.sql)
5. Process http://localhost/garages/search

Notation:
Check docker-compose.override.yml
