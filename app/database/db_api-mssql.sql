CREATE TABLE chat( 
      id  INT IDENTITY    NOT NULL  , 
      usuario_chat_id int   NOT NULL  , 
      mensagem nvarchar(max)   , 
      criada_em datetime2   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE usuario_chat( 
      id  INT IDENTITY    NOT NULL  , 
      sistema nvarchar(max)   , 
      system_user_id int   , 
      chat_id nvarchar(max)   , 
 PRIMARY KEY (id)) ; 

 
  
 ALTER TABLE chat ADD CONSTRAINT fk_chat_1 FOREIGN KEY (usuario_chat_id) references usuario_chat(id); 
