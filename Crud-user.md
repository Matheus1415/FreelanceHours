## **Autenticação**

A autenticação na API é feita através de **tokens** gerados pelo Laravel Sanctum. Após a autenticação, os usuários podem acessar rotas protegidas, como operações de CRUD de usuários e outros recursos.

### 1\. **Login do Usuário**

- **Endpoint:** `/login`
    
- **Método:** `POST`
    
- **Autenticação:** Não é necessária (público)
    

Este endpoint permite que um usuário se autentique, fornecendo suas credenciais (email e senha). Se as credenciais forem válidas, um token de acesso será gerado e retornado, permitindo que o usuário acesse rotas protegidas.

#### **Requisição:**

``` json
{
  "email": "usuario@exemplo.com",
  "password": "senha_do_usuario"
}

 ```

#### **Resposta:**

``` json
{
  "token": "seu_token_aqui",
  "token_type": "bearer",
  "expires_in": null
}

 ```

#### **Descrição da Resposta:**

- **token:** O token de acesso gerado, que deve ser usado para autenticação nas rotas protegidas.
    
- **token_type:** Tipo de token (sempre será "bearer").
    
- **expires_in:** O tempo de expiração do token (no caso do Sanctum, ele não expira por padrão).
    

---

### 2\. **Logout do Usuário**

- **Endpoint:** `/logout`
    
- **Método:** `POST`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Este endpoint revoga o token de acesso do usuário, realizando o logout.

#### **Requisição:**

Nenhuma requisição adicional necessária além do token no cabeçalho.

#### **Resposta:**

``` json
{
  "message": "Usuário deslogado com sucesso"
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando que o logout foi realizado com sucesso.
    

---

### 3\. **Obter Dados do Usuário Autenticado**

- **Endpoint:** `/user`
    
- **Método:** `GET`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Esse endpoint retorna as informações do usuário autenticado, permitindo que ele visualize seus próprios dados.

#### **Resposta:**

``` json
{
  "id": 1,
  "name": "Nome do Usuário",
  "email": "usuario@exemplo.com",
  "created_at": "2024-01-01T12:00:00",
  "updated_at": "2024-01-01T12:00:00"
}

 ```

#### **Descrição da Resposta:**

- **id:** ID único do usuário.
    
- **name:** Nome do usuário.
    
- **email:** E-mail do usuário.
    
- **created_at:** Data e hora de criação da conta.
    
- **updated_at:** Data e hora da última atualização do perfil.
    

---

## **CRUD de Usuários**

Esses endpoints permitem o gerenciamento completo de usuários no sistema, incluindo criação, listagem, exibição, atualização e exclusão.

### 1\. **Listar Todos os Usuários**

- **Endpoint:** `/all-users`
    
- **Método:** `GET`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Este endpoint retorna todos os usuários cadastrados no sistema.

#### **Resposta:**

``` json
[
  {
    "id": 1,
    "name": "Nome do Usuário",
    "email": "usuario@exemplo.com",
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  },
  ...
]

 ```

#### **Descrição da Resposta:**

- **id:** ID do usuário.
    
- **name:** Nome do usuário.
    
- **email:** E-mail do usuário.
    
- **created_at:** Data de criação da conta.
    
- **updated_at:** Data de última atualização do perfil.
    

---

### 2\. **Criar um Novo Usuário**

- **Endpoint:** `/create-user`
    
- **Método:** `POST`
    
- **Autenticação:** Não é necessária (público)
    

Este endpoint permite a criação de um novo usuário no sistema, fornecendo informações como nome, e-mail e senha.

#### **Requisição:**

``` json
{
  "name": "Novo Usuário",
  "email": "usuario@exemplo.com",
  "password": "senha_do_usuario"
}

 ```

#### **Resposta:**

``` json
{
  "message": "Usuário criado com sucesso!",
  "user": {
    "id": 1,
    "name": "Novo Usuário",
    "email": "usuario@exemplo.com",
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  }
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando a criação bem-sucedida do usuário.
    
- **user:** Detalhes do usuário recém-criado.
    

---

### 3\. **Exibir Dados de um Usuário**

- **Endpoint:** `/users/{id}`
    
- **Método:** `GET`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Esse endpoint permite que um administrador (ou o próprio usuário) veja os dados de um usuário específico.

#### **Resposta:**

``` json
{
  "id": 1,
  "name": "Nome do Usuário",
  "email": "usuario@exemplo.com",
  "created_at": "2024-01-01T12:00:00",
  "updated_at": "2024-01-01T12:00:00"
}

 ```

#### **Descrição da Resposta:**

- **id:** ID do usuário.
    
- **name:** Nome do usuário.
    
- **email:** E-mail do usuário.
    
- **created_at:** Data e hora da criação da conta.
    
- **updated_at:** Data e hora da última atualização.
    

---

### 4\. **Atualizar Dados de um Usuário**

- **Endpoint:** `/users/{id}/edit`
    
- **Método:** `POST`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Esse endpoint permite que um usuário altere seus dados ou que um administrador altere os dados de outro usuário.

#### **Requisição:**

``` json
{
  "name": "Nome Atualizado",
  "email": "novo_email@exemplo.com"
}

 ```

#### **Resposta:**

``` json
{
  "message": "Usuário atualizado com sucesso!",
  "user": {
    "id": 1,
    "name": "Nome Atualizado",
    "email": "novo_email@exemplo.com",
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  }
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando que os dados do usuário foram atualizados com sucesso.
    
- **user:** Detalhes do usuário com os dados atualizados.
    

---

### 5\. **Deletar um Usuário**

- **Endpoint:** `/users/{id}`
    
- **Método:** `DELETE`
    
- **Autenticação:** Requer o token de acesso (autenticado)
    

Esse endpoint permite que um administrador exclua um usuário do sistema.

#### **Resposta:**

``` json
{
  "message": "Usuário deletado com sucesso.",
  "user": {
    "id": 1,
    "name": "Nome do Usuário",
    "email": "usuario@exemplo.com",
    "created_at": "2024-01-01T12:00:00",
    "updated_at": "2024-01-01T12:00:00"
  }
}

 ```

#### **Descrição da Resposta:**

- **message:** Mensagem confirmando a exclusão do usuário.
    
- **user:** Detalhes do usuário que foi deletado.
