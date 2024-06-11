#!/bin/bash

# Instalar dependências do Composer
COMPOSER_ALLOW_SUPERUSER=1 composer install

# Rodar migrações
php artisan migrate --force

# Iniciar o servidor Laravel
php artisan serve --host=0.0.0.0 --port=8000

# Função para verificar se o banco de dados está acessível
wait_for_db() {
  until mysql -h db -u root -p root -e "SELECT 1;" &> /dev/null; do
    echo "Aguardando o banco de dados estar disponível..."
    sleep 2
  done
}

# Esperar até que o banco de dados esteja disponível
wait_for_db

# Configurar permissões do usuário root no MySQL
mysql -h db -u root -p root <<-EOSQL
USE mysql;
UPDATE user SET host='%' WHERE user='root' AND host='localhost';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOSQL


