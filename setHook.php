<?php
require_once "vendor/autoload.php";

try
{
    $ini = require_once('app/config/telegram.php');
    
    // Token do BOT
    $token = $ini['token'];
    
    // URL hook do BOT
    // Use a HTTPS
    $hook  = $ini['hook'];
    var_dump($hook);
    $bot = new \TelegramBot\Api\BotApi($token);
    
    // informamos ao telegram que o Token do Bot tem o seguinto webwook
    $result = $bot->setWebhook($hook);

    echo $result;
}
catch(Error $e)
{
    echo $e->getMessage();
}