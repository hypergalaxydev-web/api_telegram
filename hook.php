<?php

// https://t.me/botfather -> para criar o bot
// https://core.telegram.org/api/links
// https://t.me/builder_portaTest_bot?start=eyJ1aWQiOjEsICJzaXMiOiAidGVzdGUifQ==
// https://github.com/TelegramBot/Api
// {"uid":1, "sis": "teste"}

require 'init.php';

// TEMPLATE MESSAGE START
$mensagemTemplate = "
Olá {name},
seja bem vindo!
A sua integração está configurada!
ChatID: {chatid}";

try
{
    // Token do BOT
    $ini = require_once('app/config/telegram.php');
    $token = $ini['token'];
    
    $bot = new \TelegramBot\Api\Client($token);
    
    // ON /start send chat ID
    $bot->command('start', function ($message) use ($bot, $mensagemTemplate) {
        
        $chatId = $message->getChat()->getId();
        $name   = $message->getFrom()->getFirstName();
        
        $mensagemTemplate = str_replace('{name}',   $name, $mensagemTemplate);
        $mensagemTemplate = str_replace('{chatid}', $chatId, $mensagemTemplate);
        
        $bot->sendMessage($chatId, $mensagemTemplate, 'HTML');
        
        $start_text = $message->getText();
        
        if($start_text)
        {
            $ex = explode('/start ', $message->getText());
            
            // https://t.me/builder_portaTest_bot?start=eyJ1aWQiOjEsICJzaXMiOiAidGVzdGUifQ==
            // https://github.com/TelegramBot/Api
            // {"uid":1, "sis": "teste"}
            
            if(!empty($ex[1]))
            {
                $dados = json_decode(base64_decode($ex[1]));
                
                TelegramService::salvarStartUsuario($dados->uid, $dados->sis, $chatId);
            }
        }
    });

    // ON message text is recived
    $bot->on(function (\TelegramBot\Api\Types\Update $update) use ($bot) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();

        if ($message->getText() == 'ping') {
            $bot->sendMessage($chatId, 'pong');
        } else {
            $bot->sendMessage($chatId, 'ok, recived');
        }

    }, function () {
        return true;
    });

    $bot->run();
}
catch (\TelegramBot\Api\Exception $e)
{
    echo $e->getMessage();
}