<?php

class UsuarioChat extends TRecord
{
    const TABLENAME  = 'usuario_chat';
    const PRIMARYKEY = 'id';
    const IDPOLICY   =  'serial'; // {max, serial}

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('sistema');
        parent::addAttribute('system_user_id');
        parent::addAttribute('chat_id');
            
    }

    /**
     * Method getChats
     */
    public function getChats()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('usuario_chat_id', '=', $this->id));
        return Chat::getObjects( $criteria );
    }

    public function set_chat_usuario_chat_to_string($chat_usuario_chat_to_string)
    {
        if(is_array($chat_usuario_chat_to_string))
        {
            $values = UsuarioChat::where('id', 'in', $chat_usuario_chat_to_string)->getIndexedArray('id', 'id');
            $this->chat_usuario_chat_to_string = implode(', ', $values);
        }
        else
        {
            $this->chat_usuario_chat_to_string = $chat_usuario_chat_to_string;
        }

        $this->vdata['chat_usuario_chat_to_string'] = $this->chat_usuario_chat_to_string;
    }

    public function get_chat_usuario_chat_to_string()
    {
        if(!empty($this->chat_usuario_chat_to_string))
        {
            return $this->chat_usuario_chat_to_string;
        }
    
        $values = Chat::where('usuario_chat_id', '=', $this->id)->getIndexedArray('usuario_chat_id','{usuario_chat->id}');
        return implode(', ', $values);
    }

    
}

