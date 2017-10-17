<?php
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