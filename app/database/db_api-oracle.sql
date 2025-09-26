CREATE TABLE chat( 
      id number(10)    NOT NULL , 
      usuario_chat_id number(10)    NOT NULL , 
      mensagem varchar(3000)   , 
      criada_em timestamp(0)   , 
 PRIMARY KEY (id)) ; 

CREATE TABLE usuario_chat( 
      id number(10)    NOT NULL , 
      sistema varchar(3000)   , 
      system_user_id number(10)   , 
      chat_id varchar(3000)   , 
 PRIMARY KEY (id)) ; 

 
  
 ALTER TABLE chat ADD CONSTRAINT fk_chat_1 FOREIGN KEY (usuario_chat_id) references usuario_chat(id); 
 CREATE SEQUENCE chat_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER chat_id_seq_tr 

BEFORE INSERT ON chat FOR EACH ROW 

    WHEN 

        (NEW.id IS NULL) 

    BEGIN 

        SELECT chat_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
CREATE SEQUENCE usuario_chat_id_seq START WITH 1 INCREMENT BY 1; 

CREATE OR REPLACE TRIGGER usuario_chat_id_seq_tr 

BEFORE INSERT ON usuario_chat FOR EACH ROW 

    WHEN 

        (NEW.id IS NULL) 

    BEGIN 

        SELECT usuario_chat_id_seq.NEXTVAL INTO :NEW.id FROM DUAL; 

END;
 