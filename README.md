# Syscantina

## Instruções para rodar em um servidor local
  - Instale o xampp e levante o servidor
  - Coloque o código na pasta `htdocs`
  - Acesse `http://localhost/phpmyadmin`
  - Clique no menu "Importar"
  - Clique no botão "Escolher arquivo"
  - Selecione o arquivo `db/create_tables.sql`
  - Deixe a opção "Mapa de caracteres" como "utf-8"
  - Clique em "Executar"
  - Note que foi criado o banco de dados "cantina_kids"
  - Importe mais um arquivo: `db/insert_equipes.sql`
  - Note que os dados das equipes foram adicionadas na tabela "equipes"

## Configuração de banco de dados
  - Acesse o arquivo `conexao.php`
  - Configure os dados de usuário e senha
  - Acesse `http://localhost/syscantina`
  - Aproveite!
