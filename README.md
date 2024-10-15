# Pastas: #


### <b>server-php</b> ### 
Pasta do projeto PHP Laravel.



# Rodar o Projeto: # 

## Rodar o projeto PHP Laravel e Banco de Dados Postgres ##
### - docker compose up -d --build ### 
Sobe o container com os services e gera as imagens dos services.

### - docker compose watch develop ### 
Sobe o container com os services, monitora os arquivos do service e atualiza os mesmos no container.

## Parar o projeto PHP Laravel e Banco de Dados Postgres ##
### - docker compose down -v ###
Para o container com os services e remove os volumes.




# Criar as tabelas no banco de dados do projeto: #

## Rodar comando do PHP Laravel para criar as tabelas ##
### - php artisan migrate --force ### 
Gera as tabelas no banco de dados do projeto.




# Subir dados de teste nas tabelas no banco de dados do projeto: #

## Rodar comando do PHP Laravel para subir os dados de teste nas tabelas ##
### - php artisan db:seed ### 
Sobe os dados de teste para as tabelas no banco de dados do projeto.


## Rodar comando do PHP Laravel para subir os dados de teste para as tabelas de uma arquivo de seed específico ##
### - php artisan db:seed --class=PatientsSeeder ### 
Sobe os dados de teste para as tabelas no banco de dados do projeto de aum arquivo de seed específico.
