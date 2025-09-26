CREATE TABLE chat( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `usuario_chat_id` int   NOT NULL  , 
      `mensagem` text   , 
      `criada_em` datetime   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE usuario_chat( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `sistema` text   , 
      `system_user_id` int   , 
      `chat_id` text   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

 
  
 ALTER TABLE chat ADD CONSTRAINT fk_chat_1 FOREIGN KEY (usuario_chat_id) references usuario_chat(id); 
