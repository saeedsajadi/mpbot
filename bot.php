<?php

use Telegram\Bot\Api;

require 'vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

//inintialize ob_start() to log output in log file
ob_start();

//set time zone to tehran
date_default_timezone_set('Asia/Tehran');

require 'config/database.php';
require 'helpers/functions.php';

//initialize telegram sdk
$telegram = new Api(env('TELEGRAM_BOT_API_TOKEN'));

//get updates(response) from telegram as webhook
$update = $telegram->getWebhookUpdate();

//if telegram response is glass buttons
if ($update->isType('callback_query')) {
    include_once('process_updates/callback_query.php');
//if telegram response is not glass butoons
} elseif ($update->isType('message')) {
    include_once('process_updates/message.php');
}
file_put_contents('log', ob_get_clean());