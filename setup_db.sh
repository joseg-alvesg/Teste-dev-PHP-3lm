#!/bin/bash

source .env
# verificar o erro dado no .venv

cat database.sql | \
  sed "s/@DB_HOST@/$DB_HOST/g; s/@DB_USER@/$DB_USER/g; s/@DB_PASS@/$DB_PASS/g; s/@DB_NAME@/$DB_NAME/g" > database_final.sql

mariadb -h $DB_HOST -u $DB_USER -p$DB_PASS < database_final.sql
