# HUAC - Agendamento Cirúrgico do Hospital Universitário

## Pré requisitos do sistema
- PHP 7.3.4-2
- PostgreSQL 11.3
- Composer 1.8.4
- Sistema operacional linux

## Instalação
- Copie os arquivos do CD de instalação para uma pasta no seu computador.
- Entre na pasta que você copiou 
- Rode o comando abaixo e instale as dependências usando o composer: 
```bash
composer install
```
- Crie o arquivo com as variáveis de ambiente usando o comando abaixo (ou copie o arquivo manualmente): 
```bash
cp .env.example .env
```
- Caso deseje utilizar autenticação com o google, é ness um cadastro na api de autenticação (OUATH)
com o nome do seu host e obter as chaves de autenticação.
Para usar envio de email para redefinição de senha, cadastre um servidor de emails no arquivo.
Está pré-configurado para o gmail, mas caso utilize esta opção, é necessário permitir o acesso de aplicativos menos seguros a conta.
- Modifique o arquivo `.env` com suas configurações de banco de dados, que já deve ter sido criado previamente,
o nome do seu localhos e os dados de autenticação na api do google.
Este é um exemplo de como deve ficar o arquivo `.env` após as configurações necessárias:

```txt
APP_NAME=HUAC
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=NOME_DO_SEU_LOCALHOST
API_TOKEN=teste

LOG_CHANNEL=stack

DB_CONNECTION=pgsql
DB_HOST=HOST_BANCO_DE_DADOS
DB_PORT=PORTA_BANCO_DE_DADOS
DB_DATABASE=NOME_DA_DATABASE_CRIADA
DB_USERNAME=USERNAME_DO_BANCO_DE_DADOS
DB_PASSWORD=PASSWORD_DO_BANCO_DE_DADOS

BROADCAST_DRIVER=pusher
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=SEU_USUARIO_GMAIL - PARTE ANTES DO @
MAIL_PASSWORD=SUA_SENHA_DO_GMAIL
MAIL_ENCRYPTION=tls

PUSHER_APP_ID=848179
PUSHER_APP_KEY=81d1a717599e253f378e
PUSHER_APP_SECRET=4b5b2bfe2aa203612d0f
PUSHER_APP_CLUSTER=us2

CONFIRMED=3

PASSPORT_TOKEN_EXPIRES_IN=15

OAUTH_GOOGLE_ID=SEU_GOOGLE_OAUTH_ID
OAUTH_GOOGLE_SECRET=SEU_GOOGLE_OAUTH_SECRET
OAUTH_GOOGLE_REDIRECT_URL=SUA_URL_DE_CALLBACK

#MIX VARIABLES:
MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
MIX_APP_URL="${APP_URL}"
MIX_API_TOKEN="${API_TOKEN}
```
- Salve o arquivo e o feche.
- Gere uma chave de criptografia para a aplicação: 
```bash
php artisan key:generate
```
- Crie as tabelas no banco de dados pelo terminal linux:
```bash
php artisan migrate
```
- Configure a comunicação com api:
```bash
php artisan passport:install
```
- Adicione os dados pré cadastrados ao banco de dados:
```bash
php artisan db:seed
```
- Inicie o servidor: 
```bash
php artisan serve
```
