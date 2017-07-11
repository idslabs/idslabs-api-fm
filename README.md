idslabs-image
===============

#Images API Handler
Este módulo é proposto para lidar com a manipulação de imagem para uma API ( REST ). Ele usa o MySQL e PostregreSQL com "Doctrine ORM". Este módulo é extensível para usar outro adaptador de banco de dados.

Atualmente, este módulo oferece suporte a esses recursos com a autenticação OAuth2

- POST  /v1/image
- GET   /v1/image/id
- PATCH /v1/image/id
- DELETE  /v1/image/id

Para recuperar o token de acesso, você pode usar esse recurso POST para o endpoint /oauth usando alguns parâmetros:

- grant_type
- client_secret
- client_id
- username
- password

Dependências
------------
- [doctrine/doctrine-orm-module](https://packagist.org/packages/doctrine/doctrine-orm-module)
- [zfcampus/zf-oauth2-doctrine](https://packagist.org/packages/zfcampus/zf-oauth2-doctrine)
