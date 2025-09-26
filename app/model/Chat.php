<?php

class Chat extends TRecord
{
    const TABLENAME  = 'chat';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    const CREATEDAT  = 'criada_em';

    private $usuario_chat;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('usuario_chat_id');
        parent::addAttribute('mensagem');
        parent::addAttribute('criada_em');
            
    }

    /**
     * Method set_usuario_chat
     * Sample of usage: $var->usuario_chat = $object;
     * @param $object Instance of UsuarioChat
     */
    public function set_usuario_chat(UsuarioChat $object)
    {
        $this->usuario_chat = $object;
        $this->usuario_chat_id = $object->id;
    }

    /**
     * Method get_usuario_chat
     * Sample of usage: $var->usuario_chat->attribute;
     * @returns UsuarioChat instance
     */
    public function get_usuario_chat()
    {
    
        // loads the associated object
        if (empty($this->usuario_chat))
            $this->usuario_chat = new UsuarioChat($this->usuario_chat_id);
    
        // returns the associated object
        return $this->usuario_chat;
    }

    
}

