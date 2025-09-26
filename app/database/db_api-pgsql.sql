CREATE TABLE chat( 
      id  SERIAL    NOT NULL  , 
      usuario_chat_id integer   NOT NULL  , 
      mensagem text   , 
      criada_em timestamp   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE usuario_chat( 
      id  SERIAL    NOT NULL  , 
      sistema text   , 
      system_user_id integer   , 
      chat_id text   , 
 PRIMARY KEY (id)) ; 

 
  
 ALTER TABLE chat ADD CONSTRAINT fk_chat_1 FOREIGN KEY (usuario_chat_id) references usuario_chat(id); 
 
 CREATE index idx_chat_usuario_chat_id on chat(usuario_chat_id); 
