# dotDotSis

Um produto feito para estudo, se trata de uma api feita em php5.3, com o mysql 5.7, phpmyadmin tudo rodando dentro de containers


## Installation

Clone o repositorio

```sh
git clone https://github.com/livioweb/dot.git
```

Vamos agora, subir os containers nescessarios para o funcionamento da aplicação. Para isso, conto que vc ja tenha o docker e o docker-compose instalado na sua maquina

```sh
docker-composer up --build
```



Se tudo deu certo, então nada deu errado e agora vc pode acessar a primeira verificação no endereço

```sh
http://localhost/
```

## Let's go to the paty
```sh
http://localhost/api/tasks/index.php
```

Agora, vc deve acessar o phpmyadmin e criar a database, nescessaria

```
http://localhost:8080/
```
Os dados de acesso são:


```
host: db
user: root
password:root
```
Acesse esse endereço, que vai da certinho onde vc vai executar o sql

```
http://localhost:8080/db_sql.php?db=dotdot
```
SQL
```
CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `priority` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;


INSERT INTO `tasks` (`id`, `titulo`, `description`, `priority`) VALUES
(1, 'Concluir Projeto', 'Concluir o projeto no tempo da sprint.','2'),
(2, 'Inserir botao na pagina inicial', 'Gadgets, inserir botas de impressao na pagina inicial do boleto.', '3'),
(3, 'Verificar sql criando index', 'melhorar consultas sql', '1')

```

Entãoa gora pode acessar o endereço:
```sh
http://localhost/api/tasks/index.php
```
onde vc vai poder brincar com o dragdrop de prioridades

## Agora vamos testar a api

Foi criado diversas rotas(arquivos), foi ate bem nostalgico trabalhar assim, então vamos la. 


Utilizando o POSTMAN ou outro cliente http de sua preferencia(CURL), vc pode efetuar as chamadas nos seguintes endpoints

Listar Tasks
```sh
http://localhost/api/tasks/read.php
```

Criar Tasks

```sh
http://localhost/api/tasks/create.php
```
json exemplo para criar uma tasks
```sh
{
    "tasks": [
        {
            "titulo": "Inserido pelo post",
            "description": "inserido pelo post",
            "priority": "3"
        }
    ]
}

```


Listar uma Tasks
```sh
http://localhost/api/tasks/readone.php?id=1
```
Alterar Tasks
```sh
http://localhost/api/tasks/update.php
```


```sh
{
    "id": "1",
    "titulo": "JSON UPDATE",
    "description": "melhorar consultas sql",
    "priority": "1"
}
```

Deletar Tasks
```sh
http://localhost/api/tasks/delete.php
```


```sh
{
    "id": "1"
}
```


## Meta

Livio Rodrigues Lopes  – liviorodrigueslopes@gmail.com

Distributed under the GNU license. See ``LICENSE`` for more information.


