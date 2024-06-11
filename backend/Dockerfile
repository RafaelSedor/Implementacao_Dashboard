# Use a imagem base do PHP-FPM
FROM php:8.1-fpm

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    procps \
    net-tools \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar os arquivos da aplicação para o contêiner
COPY . /var/www

# Copiar o arquivo php.ini para o diretório de configuração do PHP
COPY php.ini /usr/local/etc/php/conf.d/php.ini

# Copiar e executar o script de inicialização
COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

# Definir o diretório de trabalho
WORKDIR /var/www

# Ajustar permissões
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Expor a porta 8000 para o servidor embutido do Laravel
EXPOSE 8000

# Iniciar o script de inicialização
CMD ["/usr/local/bin/init.sh"]
