<?php

class TelegramService
{
    public static function enviarMensagem($param)
    {
        if(empty($param['sistema']))
        {
            throw new Exception('O sistema é obrigatório');
        }
        
        if(empty($param['system_user_id']))
        {
            throw new Exception('O código do usuário é obrigatório');
        }
        
        TTransaction::open('db_api');
        
        $usuarioChat = UsuarioChat::where('sistema', '=', $param['sistema'])->where('system_user_id', '=', $param['system_user_id'])->first();
        
        if(!$usuarioChat)
        {
            throw new Exception('Usuário não encontrado');
        }
        
        try 
        {
            $ini = require_once('app/config/telegram.php');
            $bot = new \TelegramBot\Api\BotApi($ini['token']);
            $botMessage = $bot->sendMessage($usuarioChat->chat_id, $param['mensagem']);    
        } 
        catch (Exception $e) 
        {
            throw $e;
        }
        
        $chat = new Chat();
        $chat->usuario_chat_id = $usuarioChat->id;
        $chat->mensagem = $param['mensagem'];
        $chat->store();
        
        TTransaction::close();
        
        return true;
    }
    
    public static function salvarStartUsuario($system_user_id, $sistema, $chat_id)
    {
        TTransaction::open('db_api');
        
        $usuarioChat = UsuarioChat::where('system_user_id', '=',$system_user_id)->where('sistema', '=', $sistema)->where('chat_id', '=', $chat_id)->first();
        
        if(!$usuarioChat)
        {
            $usuarioChat = new UsuarioChat();
            $usuarioChat->chat_id = $chat_id;
            $usuarioChat->sistema = $sistema;
            $usuarioChat->system_user_id = $system_user_id;
            $usuarioChat->store();
        }
        
        TTransaction::close();
    }
    
    
}
