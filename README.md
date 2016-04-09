# Moviepedia

Uma simples aplicação escrita em php, usando o Zend Framework 1.12.

#### Conteúdo

Este projeto contem alem do codigo-fonte, um ambiente de desenvolvimento pre-configurado com: 

* Mysql 5.5
* PHP 5.6
* Python 2.6 (+Pypy)
* MongoDB
* Nginx
* zf-tool

Parte do script foi criado atraves do [phansible](http://phansible.com/). O role do python foi parcialmente baseado [neste post](https://doughellmann.com/blog/2015/03/07/ansible-roles-for-python-developers/).


#### instruções

Para rodar a VM, basta iniciar o vagrant (``vagrant up``). A aplicação estará disponivel no ip ``10.11.10.2``. 

O diretorio ``public`` deve contar os arquivos-fonte da aplicação.


#### Extras

* Comandos para o zf-tool * 

zf configure db-adapter "adapter=PDO_MYSQL&dbname=[movies]&host=[127.0.0.1:9000]&username=[movieuser]&password=[movie123]" -s development


zf configure db-adapter "adapter=Pdo_Mysql&host=10.11.10.2&username=root&password=&dbname=moviepedia&charset=utf8"

zf enable layout

zf create controller movie
zf create action add movie

zf create controller publisher &&
zf create action add publisher &&
zf create action edit publisher &&
zf create action delete publisher &&
zf create db-table Publisher publisher &&
zf create form Publisher

zf create controller genre &&
zf create action add genre &&
zf create action edit genre &&
zf create action delete genre &&
zf create db-table Genre genre &&
zf create form Genre


