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

O diretorio ``public`` deve conter os arquivos-fonte da aplicação.

#### Contribua

Se quiser contribuir ou usar o projeto em qualquer lugar, fique a vontade =)