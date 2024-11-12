StartFragment

### **Documentação do CRUD de Startups**

Essa seção descreve os endpoints da API responsáveis pela criação, leitura, atualização e exclusão de **startups** no sistema. As rotas de startups são protegidas e requerem autenticação, utilizando **Laravel Sanctum** para garantir a segurança e o controle de acesso.

---

## **CRUD de Startups**

Esses endpoints permitem o gerenciamento de **startups** no sistema, desde a listagem, criação, visualização, atualização e exclusão até a exclusão em grupo.

### 1\. **Listar Todas as Startups**

- **Endpoint:** `/all-startup`
    
- **Método:** `GET`
    
- **Autenticação:** Requer o token de acesso (autenticado) com permissão de startup
    

Este endpoint retorna todas as startups cadastradas no sistema.

#### **Resposta:**

``` json
[
  {
    "id": 1,
    "title": "Startup Exemplo",
    "description": "Descrição da startup.",
    "tempo_disponivel": "6 meses",
    "tecnologias": ["PHP", "Laravel", "MySQL"],
    "contato_informacao": "contato@startup.com",
    "licenca": "MIT",
    "tags": ["tecnologia", "inovação"],
    "user_id": 1,
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  },
  ...
]

 ```

#### **Descrição da Resposta:**

- **id:** ID único da startup.
    
- **title:** Título da startup.
    
- **description:** Descrição breve da startup.
    
- **tempo_disponivel:** Tempo disponível para a startup (ex: 6 meses).
    
- **tecnologias:** Lista de tecnologias utilizadas pela startup (em formato JSON).
    
- **contato_informacao:** Informações de contato da startup.
    
- **licenca:** Licença sob a qual a startup está registrada.
    
- **tags:** Tags associadas à startup (em formato JSON).
    
- **user_id:** ID do usuário responsável pela startup.
    
- **created_at:** Data de criação da startup.
    
- **updated_at:** Data de última atualização da startup.
    

---

### 2\. **Criar uma Nova Startup**

- **Endpoint:** `/create-startup`
    
- **Método:** `POST`
    
- **Autenticação:** Requer o token de acesso (autenticado) com permissão de startup
    

Este endpoint permite a criação de uma nova startup, associando-a a um usuário específico e fornecendo informações como título, descrição, tecnologias, tempo disponível, entre outras.

#### **Requisição:**

``` json
{
  "title": "Nova Startup",
  "description": "Descrição da nova startup.",
  "tempo_disponivel": "12 meses",
  "tecnologias": ["React", "Node.js"],
  "contato_informacao": "contato@novastartup.com",
  "licenca": "Apache-2.0",
  "tags": ["inovação", "tecnologia"],
  "user_id": 1
}

 ```

#### **Resposta:**

``` json
{
  "message": "Startup criada com sucesso!",
  "startup": {
    "id": 1,
    "title": "Nova Startup",
    "description": "Descrição da nova startup.",
    "tempo_disponivel": "12 meses",
    "tecnologias": ["React", "Node.js"],
    "contato_informacao": "contato@novastartup.com",
    "licenca": "Apache-2.0",
    "tags": ["inovação", "tecnologia"],
    "user_id": 1,
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  }
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando a criação bem-sucedida da startup.
    
- **startup:** Detalhes da startup recém-criada.
    

---

### 3\. **Exibir uma Startup Específica**

- **Endpoint:** `/startup/{id}`
    
- **Método:** `GET`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Este endpoint permite que um usuário ou administrador visualize os dados de uma startup específica, usando seu ID.

#### **Resposta:**

``` json
{
  "id": 1,
  "title": "Startup Exemplo",
  "description": "Descrição da startup.",
  "tempo_disponivel": "6 meses",
  "tecnologias": ["PHP", "Laravel", "MySQL"],
  "contato_informacao": "contato@startup.com",
  "licenca": "MIT",
  "tags": ["tecnologia", "inovação"],
  "user_id": 1,
  "created_at": "2024-01-01T12:00:00",
  "updated_at": "2024-01-01T12:00:00"
}

 ```

#### **Descrição da Resposta:**

- **id:** ID único da startup.
    
- **title:** Título da startup.
    
- **description:** Descrição da startup.
    
- **tempo_disponivel:** Tempo disponível da startup.
    
- **tecnologias:** Tecnologias utilizadas (em formato JSON).
    
- **contato_informacao:** Informações de contato.
    
- **licenca:** Licença da startup.
    
- **tags:** Tags associadas à startup.
    
- **user_id:** ID do usuário responsável pela startup.
    
- **created_at:** Data de criação da startup.
    
- **updated_at:** Data da última atualização.
    

---

### 4\. **Atualizar Dados de uma Startup**

- **Endpoint:** `/startup/{id}/edit`
    
- **Método:** `PUT`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Esse endpoint permite que um usuário ou administrador altere os dados de uma startup específica. Apenas os usuários autorizados (o próprio usuário responsável ou administradores) podem realizar a atualização.

#### **Requisição:**

``` json
{
  "title": "Startup Atualizada",
  "description": "Descrição da startup atualizada.",
  "tempo_disponivel": "24 meses",
  "tecnologias": ["PHP", "Laravel", "Vue.js"],
  "contato_informacao": "contato@startupatualizada.com",
  "licenca": "MIT",
  "tags": ["tecnologia", "inovação", "frontend"]
}

 ```

#### **Resposta:**

``` json
{
  "message": "Startup atualizada com sucesso!",
  "startup": {
    "id": 1,
    "title": "Startup Atualizada",
    "description": "Descrição da startup atualizada.",
    "tempo_disponivel": "24 meses",
    "tecnologias": ["PHP", "Laravel", "Vue.js"],
    "contato_informacao": "contato@startupatualizada.com",
    "licenca": "MIT",
    "tags": ["tecnologia", "inovação", "frontend"],
    "user_id": 1,
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-02T12:00:00"
  }
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando a atualização bem-sucedida da startup.
    
- **startup:** Detalhes da startup com os dados atualizados.
    

---

### 5\. **Excluir uma Startup**

- **Endpoint:** `/startup/{id}`
    
- **Método:** `DELETE`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Esse endpoint permite que um usuário ou administrador exclua uma startup específica. O usuário precisa ser o responsável pela startup ou um administrador para poder deletá-la.

#### **Resposta:**

``` json
{
  "message": "Startup deletada com sucesso.",
  "startup": {
    "id": 1,
    "title": "Startup Exemplo",
    "description": "Descrição da startup.",
    "tempo_disponivel": "6 meses",
    "tecnologias": ["PHP", "Laravel", "MySQL"],
    "contato_informacao": "contato@startup.com",
    "licenca": "MIT",
    "tags": ["tecnologia", "inovação"],
    "user_id": 1,
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  }
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando a exclusão bem-sucedida da startup.
    
- **startup:** Detalhes da startup que foi excluída.
    

---

### 6\. **Excluir uma Startup em Grupo**

- **Endpoint:** `/startup/{id}/group`
    
- **Método:** `DELETE`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Este endpoint permite a exclusão de uma startup específica associada a um grupo ou condição especial. A lógica de exclusão em grupo pode variar dependendo da implementação e das permissões.

#### **Resposta:**

``` json
{
  "message": "Startup deletada com sucesso.",
  "startup": {
    "id": 1,
    "title": "Startup Exemplo",
    "description": "Descrição da startup.",
    "tempo_disponivel": "6 meses",
    "tecnologias": ["PHP", "Laravel", "MySQL"],
    "contato_informacao": "contato@startup.com",
    "licenca": "MIT",
    "tags": ["tecnologia", "inovação"],
    "user_id": 1,
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  }
}

 ```
