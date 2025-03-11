# ACA - Agro Commerce App 🌱

O **ACA** é um sistema web desenvolvido como TCC para o curso técnico da ETEC Itapeva em 2020. Ele é voltado para o mercado agrícola, permitindo que usuários se cadastrem, façam login, cadastrem produtos para venda, filtrem produtos listados e conversem entre si sobre compra e venda.

---

## Funcionalidades Principais ✨

- **Cadastro e Login de Usuários**:
  - Sistema de cadastro e autenticação de usuários.
  - Criptografia de dados para segurança.

- **Cadastro de Produtos**:
  - Usuários podem cadastrar produtos para venda.
  - Edição e exclusão de produtos cadastrados.

- **Listagem e Filtragem de Produtos**:
  - Página de grade de produtos com filtros para busca.
  - Visualização detalhada de cada produto.

- **Chat entre Usuários**:
  - Sistema de chat para negociação de compra e venda.

- **Segurança**:
  - Proteção contra SQL Injection e XSS Injection.
  - Criptografia de dados sensíveis.

---

## Tecnologias Utilizadas 🛠️

- **Frontend**:
  - HTML5
  - CSS3 (Bootstrap)
  - JavaScript

- **Backend**:
  - PHP (com foco em segurança e anti-injeção)
  - MySQL (banco de dados)

---

## Estrutura do Projeto 🗂️

```
ACA/
├── Pessoas/               # Arquivos relacionados ao cadastro de usuários
├── Produtos/              # Arquivos relacionados ao cadastro de produtos
├── bootstrap-3.3.7-dist/  # Bootstrap 3.3.7
├── bootstrap-4.5.0-dist/  # Bootstrap 4.5.0
├── conexao/               # Arquivos de conexão com o banco de dados
├── css/                   # Estilos CSS
├── fonts/                 # Fontes utilizadas
├── images/                # Imagens do projeto
├── js/                    # Scripts JavaScript
├── scss/                  # Arquivos SCSS
├── sistema_cca.sql.zip    # Backup do banco de dados
├── admin.php              # Página de administração
├── index.php              # Página inicial
└── ...                    # Outros arquivos PHP
```

---

## Como Executar 🚀

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/seu-usuario/ACA.git
   cd ACA
   ```

2. **Configure o banco de dados**:
   - Importe o arquivo `sistema_cca.sql.zip` para o MySQL.

3. **Configure as credenciais do banco de dados**:
   - Edite os arquivos de conexão na pasta `conexao/`.

4. **Acesse o projeto**:
   - Coloque os arquivos em um servidor web (como XAMPP ou WAMP).
   - Acesse o projeto no navegador: `http://localhost/ACA`.

---

## Licença 📜

Este projeto está licenciado sob a **MIT License** - consulte o arquivo [LICENSE](LICENSE) para mais detalhes.
