# Teste-dev-PHP-3lm

#### Sobre: 
Desenvolvimento de umapágina de gerenciamento de funcionários utilizando PHP

#### Ferramentas utilizadas:
- PHP
- jasperPHP
- HTML5
- CSS3

#### Necessário para rodar:
- PHP 8
- Java JDK 1.8
- mysql 'or sql db'
- composer

#### Como rodar
```
#Caso seu banco de dados esteja com um usuario criado, será necessario alteração do arquivo .env

mysql -u 'seu_usuario' -p < database.sql # gera as tabelas dentro do banco de dados

php -S localhost:8000 # abre a porta e relaciona a aplicação a ela
```


##### todo:
- [ ] validações de campos 
    - [ ] employess insert/edit
        - [ ] firstName
        - [ ] lastName
        - [ ] birtDate
        - [ ] salary
    - [ ] role insert/edit
        - [ ] description
- [ ] remoção de variáveis repetidas
- [ ] Verificar integração do jasperphp no windows
- [ ] ...
