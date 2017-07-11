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
- [api-skeletons/zf-doctrine-data-fixture](https://packagist.org/packages/api-skeletons/zf-doctrine-data-fixture) [![Build status](https://api.travis-ci.org/API-Skeletons/zf-doctrine-data-fixture.svg)](http://travis-ci.org/API-Skeletons/zf-doctrine-data-fixture)
- [api-skeletons/zf-oauth2-doctrine](https://packagist.org/packages/api-skeletons/zf-oauth2-doctrine) [![Build Status](https://travis-ci.org/API-Skeletons/zf-oauth2-doctrine.svg)](https://travis-ci.org/API-Skeletons/zf-oauth2-doctrine)
