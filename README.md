# 🚀 **FreelanceHours**

O **FreelanceHours** é um projeto full-stack desenvolvido com Laravel (framework PHP) e Livewire para construção de aplicações dinâmicas e responsivas. A plataforma conecta criadores de ideias a patrocinadores interessados, permitindo que criadores registrem suas ideias de projetos e patrocinadores enviem propostas para financiar ou colaborar com essas ideias.

---

## 🎯 **Funcionalidades Principais**
1. **📝 Gestão de Ideias**:
   - Criadores podem cadastrar suas ideias de projetos com descrições detalhadas, objetivos e metas.

2. **💰 Envio de Propostas**:
   - Patrocinadores podem visualizar projetos e enviar propostas detalhadas de colaboração ou financiamento.
   - Propostas incluem valor oferecido, termos e condições, e possíveis contrapartidas.

---

## 📸 Capturas de Tela

![Foto da Página Inicial](https://github.com/Matheus1415/FreelanceHours/blob/main/list-startup.png)
![Foto da Página de historico de atividades](https://github.com/Matheus1415/FreelanceHours/blob/main/startup.png)
![Foto da Página de historico de atividades](https://github.com/Matheus1415/FreelanceHours/blob/main/proposta.png)
---

## 🛠️ **Tecnologias Utilizadas**
### 🔹 Backend:
- **🐘 PHP 8.2**: Utilizado com Laravel para construção de uma API RESTful robusta.
- **🌐 Laravel Framework 11.9**: Facilita o desenvolvimento de aplicações web seguras, escaláveis e eficientes.
- **🛠️ Laravel Tinker**: Ferramenta para testes rápidos e manipulação de modelos no ambiente de desenvolvimento.

### 🔹 Frontend:
- **⚡ Livewire 3.5**: Framework para criação de interfaces dinâmicas e interativas diretamente no PHP, sem necessidade de um framework JavaScript como Vue.js ou React.

---

## 🗄️ **Estrutura do Banco de Dados**
O banco de dados foi estruturado com o Eloquent ORM do Laravel, seguindo uma arquitetura relacional.

### 📂 **Tabela: `users`**
- **Campos**:
  - `🆔 id`: Identificador único.
  - `👤 name`: Nome do usuário.
  - `📧 email`: Endereço de e-mail único.
  - `🔑 password`: Senha protegida por hashing.
  - `🎭 role`: Define se o usuário é "criador" ou "patrocinador".
  - `⏳ timestamps`: Campos padrão de criação e atualização.

### 📂 **Tabela: `projects`**
- **Campos**:
  - `🆔 id`: Identificador único.
  - `👤 user_id`: Relacionamento com o criador do projeto.
  - `📌 title`: Título da ideia.
  - `📝 description`: Descrição detalhada.
  - `📊 status`: Indica se está ativo ou finalizado.
  - `⏳ timestamps`: Campos padrão de criação e atualização.

### 📂 **Tabela: `proposals`**
- **Campos**:
  - `🆔 id`: Identificador único.
  - `📌 project_id`: Relacionamento com o projeto.
  - `👤 user_id`: Relacionamento com o patrocinador.
  - `💲 amount`: Valor proposto.
  - `📜 terms`: Termos e condições da proposta.
  - `📊 status`: Indica se a proposta foi aceita, recusada ou está pendente.
  - `⏳ timestamps`: Campos padrão de criação e atualização.

### 🔧 **Alterações na Tabela `proposals`**
- Adição de campos específicos para acompanhamento e feedback, como:
  - `🗣️ feedback`: Feedback do criador sobre a proposta.
  - `📅 review_date`: Data da última revisão.

---

## 🎯 **Motivação e Objetivo**
O **FreelanceHours** busca oferecer uma solução prática para criadores que precisam de suporte financeiro ou técnico para transformar suas ideias em realidade. Simultaneamente, proporciona um ambiente seguro para patrocinadores encontrarem projetos promissores alinhados com seus interesses.

---

## 🚀 **Instalação e Configuração**

### **📥 Passo 1: Clonar o Repositório**
Clone o repositório do projeto para sua máquina local:

```bash
git clone https://github.com/Matheus1415/FreelanceHours.git
```

### **📦 Passo 2: Instalar Dependências PHP**
Instale todas as dependências do projeto utilizando o Composer:

```bash
composer install
```

### **⚙️ Passo 3: Configurar o Arquivo .env**
Atualize as seguintes variáveis ​​no arquivo `.env` para corresponder às configurações do seu banco de dados:

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=freelancehours
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### **🔑 Passo 4: Gerar a Chave da Aplicação**
Gere a chave do aplicativo Laravel:

```bash
php artisan key:generate
```

### **🗄️ Passo 5: Migrar o Banco de Dados**
Execute as migrações para criar as tabelas permitidas no banco de dados:

```bash
php artisan migrate
```

Opcionalmente, você pode popular o banco de dados com dados de exemplo:

```bash
php artisan db:seed
```

🚀 Agora você está pronto para rodar o **FreelanceHours** e conectar criadores e patrocinadores! 🎉

