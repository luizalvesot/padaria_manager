# Padaria Manager

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4EE0F4?style=for-the-badge&logo=livewire&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

## Descrição do Projeto

O **Padaria Manager** é um sistema de gerenciamento de vendas e estoque desenvolvido para padarias de pequeno porte. Ele oferece uma solução completa para controlar clientes, fornecedores, produtos, vendas (fiado e à vista), proporcionando uma facilidade na gestão das vendas.

## Funcionalidades Principais

O sistema abrange as seguintes áreas essenciais para a gestão de uma padaria:

*   **Gestão de Clientes**: Cadastro, edição e visualização de informações de clientes.
*   **Gestão de Fornecedores**: Cadastro, edição e visualização de informações de fornecedores.
*   **Gestão de Produtos**: Cadastro de produtos com suas respectivas categorias e unidades de medida.
*   **Gestão de Categorias de Produtos**: Definição e gerenciamento de categorias para organização dos produtos.
*   **Gestão de Unidades de Medida**: Cadastro de diferentes unidades de medida para os produtos.
*   **Controle de Vendas**: Registro de vendas, com suporte para vendas à vista e vendas fiado.
*   **Relatórios de Vendas Detalhados**: Visualização de vendas com filtros por ID da venda, nome do cliente, período (data inicial e final) e status de pagamento (pago, a receber).
    *   **Métricas de Vendas**: Exibição de totais de vendas exibidas, valor total das vendas, valor a receber, quantidade de vendas pagas e quantidade de vendas finalizadas.

## Tecnologias Utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

*   **Backend**: PHP 8.x, Laravel Framework
*   **Frontend**: Livewire, Blade Templates, Bootstrap 5
*   **Banco de Dados**: MySQL

## Demonstração do Sistema

Assista a uma demonstração completa do sistema no Google Drive para ver as funcionalidades: 

<div align="center">

[![Assistir Demonstração no Google Drive](https://img.shields.io/badge/▶%20Assistir%20Demonstração-Google%20Drive-1f77e3?style=for-the-badge&logo=googledrive)](https://drive.google.com/file/d/1K76Tj4LvB1HaQRBwAuFblBtCEjAd83my/view?usp=sharing)

</div>

> **📌 Nota:** O vídeo está hospedado no Google Drive para melhor compatibilidade. Clique no badge acima para assistir a uma demonstração completa do sistema!

O vídeo apresenta a interface de usuário intuitiva, o fluxo de trabalho para gerenciar vendas (fiado e à vista), e a utilização dos filtros de relatórios para obter métricas detalhadas.

## Instalação e Configuração

Para configurar e executar o projeto localmente, siga os passos abaixo:

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/luizalvesot/padaria_manager.git
    cd padaria_manager
    ```

2.  **Instale as dependências do Composer:**
    ```bash
    composer install
    ```

3.  **Instale as dependências do Node.js:**
    ```bash
    npm install
    ```

4.  **Copie o arquivo de ambiente e configure-o:**
    ```bash
    cp .env.example .env
    ```
    Edite o arquivo `.env` e configure as credenciais do seu banco de dados MySQL.

5.  **Gere a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

6.  **Execute as migrações do banco de dados:**
    ```bash
    php artisan migrate
    ```

7.  **Inicie o servidor de desenvolvimento:**
    ```bash
    php artisan serve
    ```

8.  **Compile os assets do frontend:**
    ```bash
    npm run dev
    ```

Agora você pode acessar o sistema em `http://127.0.0.1:8000` (ou a porta que o Laravel Artisan indicar).


---

## Autor

**Luiz Otavio Alves**

- GitHub: [@luizalvesot](https://github.com/luizalvesot)
- Portfólio: https://alvesluizotavio.tec.br

