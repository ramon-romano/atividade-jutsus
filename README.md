# Identificador de Jutsu (AFND)

Aplicação (Laravel) que identifica qual Jutsu foi realizado a partir da sequência de selos de mão, utilizando **AFND** (Autômato Finito Não Determinístico) e exibindo uma **tabela dinâmica** (estados alcançados a cada passo).

## Integrantes

- RAMON ROMANO TARDETTI (R.A.: 172311597)


## Requisito do exercício (resumo)

- Usar o conceito de **AFND** com **tabela dinâmica**
- Identificar o **Jutsu** a partir dos **selos**

Lista de selos: https://naruto.fandom.com/pt-br/wiki/Selos_de_M%C3%A3o

## Como usar

### UI (web)

- Acesse `GET /jutsu` e monte a sequência de selos.

### API

- `POST /api/jutsu`
  - Body JSON: `{ "selos": ["TIGRE", "DRAGAO", "COELHO", "TIGRE"] }`
  - Query opcional: `?tabela=1` (inclui a tabela dinâmica no retorno)

## Configuração do AFND

- Transições, estado inicial e estados finais em `config/automato.php`.
