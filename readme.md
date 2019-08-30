# HUAC - Agendamento Cirúrgico do Hospital Universitário

## Instalação
- Execute o comando 
```bash
git clone https://github.com/mateusjunges/projeto-software-2019.git
```
- Entre na pasta do projeto: 
```bash
cd projeto-software-2019
```
- Instale as dependências usando o composer: 
```bash
composer install
```
- Crie o arquivo com as variáveis de ambiente: 
```bash
cp .env.example .env
```
- Modifique o arquivo `.env` com suas configurações de banco de dados.
- Gere uma chave de criptografia para a aplicação: 
```bash
php artisan key:generate
```
- Crie as tabelas no banco de dados:
```bash
php artisan migrate
```
- Adicione os dados pré cadastrados ao banco de dados:
```bash
php artisan db:seed
```
- Inicie o servidor: 
```bash
php artisan serve
```
