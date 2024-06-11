# Aplicação Laravel com Docker

Este repositório contém uma aplicação Laravel pronta para ser executada usando Docker. Siga os passos a seguir para configurar e rodar a aplicação no seu ambiente local.

## Pré-requisitos

Antes de iniciar, certifique-se de que os seguintes softwares estão instalados na sua máquina:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Configurando a Aplicação

### 1. Clonar o Repositório

Primeiro, clone o repositório do projeto e navegue até o diretório do projeto:

```bash
git clone https://github.com/RafaelSedor/Implementacao_Dashboard.git
cd Implementacao_Dashboard
```

### 2. Configurar as Variáveis de Ambiente

Edite o arquivo `.env` com as configurações apropriadas para o seu banco de dados e outras variáveis de ambiente da aplicação. Certifique-se de que as configurações do banco de dados no `.env` correspondem às especificadas no arquivo `docker-compose.yml`.

### 3. Construir e Iniciar os Containers Docker

Construa as imagens Docker e inicie os containers com o seguinte comando:

```bash
docker-compose up -d --build
```

Este comando cria e inicia os containers em modo "detach" (em segundo plano).

### 4. Instalar Dependências PHP

Com os containers em execução, instale as dependências do PHP usando o Composer:

```bash
docker-compose exec app composer install
```

### 5. Gerar a Chave da Aplicação

Gere uma nova chave de aplicação para o Laravel:

```bash
docker-compose exec app php artisan key:generate
```

### 6. Executar as Migrações do Banco de Dados

Aplique as migrações para configurar o esquema do banco de dados:

```bash
docker-compose exec app php artisan migrate
```

### 7. Popular o Banco de Dados

Insira os dados iniciais no banco de dados (seeding):

```bash
docker-compose exec app php artisan db:seed
```

### 8. Acessar a Aplicação

Uma vez que os containers estejam em execução, acesse a aplicação no navegador em [http://localhost:8080](http://localhost:8080).

## Configurando o Banco de Dados

Para garantir que o Laravel possa se conectar ao banco de dados MySQL corretamente, siga estes passos:

### Permissões do Usuário Root

A configuração das permissões do usuário root do MySQL é realizada automaticamente pelo script de inicialização (`init.sh`). Não é necessário executar manualmente os comandos SQL.

### Conectar o Laravel ao Banco de Dados

Certifique-se de que as configurações de conexão com o banco de dados no arquivo `.env` do Laravel estejam corretas:

```env
DB_CONNECTION=mysql
DB_HOST=laravel_db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

Estas variáveis instruem o Laravel a se conectar ao banco de dados MySQL rodando no container `laravel_db`.

## Parar a Aplicação

Para parar e remover os containers Docker, execute:

```bash
docker-compose down
```

Este comando encerra todos os containers definidos no arquivo `docker-compose.yml`.

## Resolução de Problemas

Se você encontrar problemas, verifique os logs dos containers para obter mais informações:

```bash
docker-compose logs app
docker-compose logs db
```

Para assistência adicional, consulte a [documentação do Laravel](https://laravel.com/docs) e a [documentação do Docker](https://docs.docker.com/).

## Considerações Finais

- **Segurança:** Mesmo que a aplicação esteja rodando apenas localmente, é sempre recomendável usar senhas seguras e personalizadas.

As credenciais padrão para acessar a aplicação são:

- **Login:** admin@example.com
- **Senha:** password

Seguindo este guia, você configurará corretamente a aplicação Laravel com Docker e poderá começar a desenvolvê-la e testá-la no seu ambiente local.