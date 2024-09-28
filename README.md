# CarParking - Sistema de Estacionamento

Este é um sistema de gerenciamento de estacionamento desenvolvido com Laravel 10 para o backend, MySQL como banco de dados e Flask como API.

## Funcionalidades

- Cadastro de veículos
- Registro de entradas e saídas
- Gerenciamento de reservas de vagas
- Controle de usuários e permissões
- API desenvolvida em Flask para integração com outros sistemas

## Tecnologias Utilizadas

- [Laravel 10](https://laravel.com/) - Framework PHP
- [Flask](https://flask.palletsprojects.com/) - Microframework Python para API
- [MySQL](https://www.mysql.com/) - Banco de dados relacional
- [Bootstrap](https://getbootstrap.com/) - Para o frontend

## Pré-requisitos

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Python >= 3.7
- Pip (gerenciador de pacotes Python)

## Instalação
1. Clone o repositório:
    ```bash
	git clone https://github.com/arthurbritosouza/CarParking.git
	cd CarParking
    ```

2. Arquivo .env:
    ```bash
	APP_NAME=Laravel
	APP_ENV=local
	APP_KEY=base64:V5QPj5T7pIpn/eL9B9+kvMD8UziPRqIpVV+CClUg+GY=
	APP_DEBUG=true
	APP_URL=http://localhost

	LOG_CHANNEL=stack
	LOG_DEPRECATIONS_CHANNEL=null
	LOG_LEVEL=debug

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=
	DB_USERNAME=root
	DB_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	FILESYSTEM_DRIVER=local
	QUEUE_CONNECTION=sync
	SESSION_DRIVER=file
	SESSION_LIFETIME=120

	MEMCACHED_HOST=127.0.0.1

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_MAILER=smtp
	MAIL_HOST=mailhog
	MAIL_PORT=1025
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null
	MAIL_FROM_ADDRESS=null
	MAIL_FROM_NAME="${APP_NAME}"

	AWS_ACCESS_KEY_ID=
	AWS_SECRET_ACCESS_KEY=
	AWS_DEFAULT_REGION=us-east-1
	AWS_BUCKET=
	AWS_USE_PATH_STYLE_ENDPOINT=false

	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	PUSHER_APP_CLUSTER=mt1

	MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
	MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
   ```

3. Instale as dependências:
    ```bash
	composer install
	npm install
    ```
    
3. Configure o ambiente:
    ```bash
	cp .env.example .env
	php artisan key:generate
    ```

4. Rode as migrações do banco de dados:
    ```bash
	php artisan migrate
    ```

5. Suba o servidor web:
    ```bash
	php artisan serve
    ```
