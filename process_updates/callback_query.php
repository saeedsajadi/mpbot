<?php

use Classes\KeyboardStr;
use Telegram\Bot\Keyboard\Keyboard;

$user = getUser($update);
$callback_data = $update->getCallbackQuery()->getData();
$callback_id = $update->getCallbackQuery()->getId();
$chat_id = $update->getCallbackQuery()->getMessage()->getChat()->getId();
$message_id = $update->getCallbackQuery()->getMessage()->getMessageId();