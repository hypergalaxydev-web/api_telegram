PRAGMA foreign_keys=OFF; 

CREATE TABLE chat( 
      id  INTEGER    NOT NULL  , 
      usuario_chat_id int   NOT NULL  , 
      mensagem text   , 
      criada_em datetime   , 
 PRIMARY KEY (id),
FOREIGN KEY(usuario_chat_id) REFERENCES usuario_chat(id)) ; 

CREATE TABLE usuario_chat( 
      id  INTEGER    NOT NULL  , 
      sistema text   , 
      system_user_id int   , 
      chat_id text   , 
 PRIMARY KEY (id)) ; 

 
 