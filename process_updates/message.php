<?php

use Classes\KeyboardStr;
use Telegram\Bot\Keyboard\Keyboard;

$text = $update->getMessage()->getText();
$chat_id = $update->getMessage()->getChat()->getId();