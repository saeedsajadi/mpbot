<?php

use Classes\KeyboardStr;
use Telegram\Bot\Keyboard\Keyboard;

$user = getUser($update);
$text = $update->getMessage()->getText();
$chat_id = $update->getMessage()->getChat()->getId();