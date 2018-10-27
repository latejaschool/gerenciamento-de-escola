# Gerenciamento de Escolas
## Introdução

Aplicação web utilizando PHP OO e Doctrine, essa aplicação foi desenvolvida no curso de PHP7 Developer de 48 horas.

## Instalação usando Composer
Primeiro clone ou baixe o projeto do github:

```bash
$ git clone https://github.com/latejaschool/gerenciamento-de-escola.git
```

Agora instale as dependências com o composer:

```bash
$ cd path/to/application
$ composer install
```

## Configurando Banco de Dados

Acesse o arquivo /src/Adaptar/Connection.php e altere algumas informações.
```php
  ...
  $params => [
      'driver'   => 'pdo_mysql',
      'user'     => '<seu usuario>',
      'password' => '<sua senha>',
      'dbname'   => '<nome do banco>',
  ]
  ...
```

Crie o banco de dados MySQL com o mesmo nome que informou no arquivo Connection.php

Agora precisará criar as tabelas, já que estamos utilizando o Doctrine basta fazer isso abaixo:
```bash
$ php vendor/bin/doctrine orm:schema-tool:create
```

## Rodando a Aplicação
Vamos agora iniciar nosso servidor local que rodará em http://localhost:8000/
```bash
$ php -S localhost:8000 -t public
```

Agora basta acessar o http://localhost:8000 (com o servidor rodando) e utilizar a aplicação.
