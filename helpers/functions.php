<?php

use Models\User;

/**
 * return telegram user saved to database or create new telegram user
 *
 * @param $update
 * @return User
 */

function getUser($update)
{
    $user = null;
    if ($update->isType('callback_query')) {
        $user = User::find($update->getCallbackQuery()->getFrom()->getId());
        if (!$user) {
            $user = User::create($update->getCallbackQuery()->getFrom()->toArray());
        }
    } elseif ($update->isType('message')) {
        $user = User::find($update->getMessage()->getFrom()->getId());
        if (!$user) {
            $data = $update->getMessage()->getFrom()->toArray();
            if ($update->getMessage()->getText() == '/start') {
                $data['step'] = '/start';
            }
            $user = User::create($data);
        }
    }

    return $user;
}
/**
 * make keyboard rows
 *
 * @param $keyboards_array
 * @param $per_row
 * @return array
 */
function keyboardRows($keyboards_array, $per_row)
{
    $j = 0;
    $buttons = [];
    for ($i = 0; $i < count($keyboards_array); $i++) {
        $buttons[ $j ][] = $keyboards_array[ $i ];
        if (($i + 1) % $per_row == 0) {
            $j++;
        }
    }

    return $buttons;
}

/**
 * send notification to telegram user
 *
 * @param $telegram
 * @param $callback_id
 */
function answerNotification($telegram, $callback_id)
{
    $telegram->answerCallbackQuery([
        'callback_query_id' => $callback_id,
        'text'              => 'پاسخ شما ثبت شد.',
    ]);
}


/**
 * convert persian and arabic numbers to english number
 *
 * @param $number
 * @return int
 */
function numberToEnglish($number)
{
    $english = array(0,1,2,3,4,5,6,7,8,9);
    $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    $arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
    $unicode_numbers = array('u06f0', 'u06f1', 'u06f2', 'u06f3', 'u06f4', 'u06f5', 'u06f6', 'u06f7', 'u06f8', 'u06f9');
    $english_number =  str_replace($persian, $english, $number);
    $english_number =  str_replace($arabic, $english, $english_number);
    $english_number =  str_replace($unicode_numbers, $english, $english_number);

    return intval($english_number);
}
