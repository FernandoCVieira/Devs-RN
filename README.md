# Desafio vaga Dev PHP :: 2024.

### Introdução ao Projeto

O gerente da associação "Devs do RN", precisa de um software para facilitar a gerência dos associados e suas anuidades. Pensando nas necessidades do gerente, listamos abaixo as funcionalidades que o software precisa ter.

1. Cadastro de associados, com:
   - Nome, E-mail, CPF e Data de filiação.
2. Cadastro de anuidades, com:
   - Ano e Valor.
   - Cada ano, o valor da anuidade pode ser diferente. Ex: 2021 = R$90,00 / 2022 = R$100,00 / 2023 = R$110,00.
   - Esse valor deve ser facilmente ajustado pelo gerente.
3. Cobrança das anuidades do associado.
   - "Checkout" das anuidade devidas pelo associado, calculando valor devido por anuidade e valor total devido.
   - Considere a Data de filiação para saber quais anuidades são devidas pelo associado.
4. "Pagamento" da anuidade de um associado.
   - Para este teste o pagamento será simplesmente uma flag no banco de dados, indicando se a anuidade foi paga ou não.
5. O software também deve ser capaz de identificar quais são os associados com pagamento em dia e quais estão em atraso.
   - Para isso considere todo novo associado devedor da anuidade corrente.

### Liguagem do projeto

- HTML
- CSS
- JavaScript
- Bootstrap
- PHP
- MySQL

### Diagrama Entidade Relacionamento - DER

![DER](/img/devs-rn.png)

### Instruções para Instalação

A seguir no próximos passo será feito as instruções de como instalar e testar a aplicação.

Passo 1: Baixe o arquivo na opção do Github Code

![DER](/img/baixe.png)

Passo 2: Descompactar e jogue a pasta no servidor local apache. Exemplo: Wampserver a pasta é www após isso poder abri navegador.

![DER](/img/projetos.png)

Passo 3: Instalar no PhpMyAdmin o banco de dados disponibilizado meu_database.sql. Após abrir o PhpMyAdmin clique na aba banco de dados depois digite o nome do banco de dados com nome meu_database e criar e logo e depois vai na aba Importa escolha o banco que foi disponibilazado meu_database.sql e la em baixo clique em importar.

![DER](/img/banco.png)

Passo 4: No arquivo do projeto connect.php irá aparecer o seguintes váriaveis Host do servido, Usuario do PhpMyAdmin, Senha e o nome do banco de dados. Respectivamente preencher ás váriaveis de acesso.

```
$db_host = "localhost:3306";
$db_username = "root";
$db_password = "";
$db_name = "meu_database";
```

Passo 5: Agora tera acesso ao projeto na aba do navegador por meio url http://localhost/Devs-do-RN/ com irá aparacer á página de login contendo E-mail e senha sendo eles como padrão
```
E-mail: admin@devs.com.br
Senha: 1234
```

![DEV](/img/login.png)

Contribuidor principal: https://github.com/FernandoCVieira