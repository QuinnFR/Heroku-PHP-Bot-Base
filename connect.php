<?php
const APIKEY = '5072808300:AAE2izT4p_5xBZjx8YDE4lSYUv-OyzduT4I';
const ADMIN  = "5177196243";

function request($method, $fields = null){
    $ch = curl_init('https://api.telegram.org/bot' . APIKEY . "/$method");
    curl_setopt($ch, 19913, true);
    curl_setopt($ch, 10015, $fields);
    $res = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return $res;
}
function isMedia($msg, $list = ['animation', 'voice', 'video_note', 'document', 'video', 'photo', 'audio', 'sticker']){
    foreach($list as $value)
        if(isset($msg[$value]))
            return true;
    return false;
}

$update = json_decode(file_get_contents('php://input'), true);
$message = $update['message'];
$fromId = $update['message']['from']['id'] ?? 0;
$text   = $update['message']['text'] ?? null;
$msgId  = $update['message']['message_id'] ?? 0;

if($fromId != ADMIN && isMedia($update['message'])){
    $sentId = request('forwardMessage', [
        'chat_id'      => ADMIN,
        'from_chat_id' => $fromId,
        'message_id'   => $msgId
    ])['result']['message_id'];
    if(isset($update['message']['forward_date'])){
        request('sendMessage', [
            'chat_id'             => ADMIN,
            'text'                => "Main sender: <a href=\"tg://user?id=$fromId\">{$update['message']['from']['first_name']}</a>",
            'reply_to_message_id' => $sentId,
            'parse_mode'          => 'HTML'
        ]);
    }
}
elseif(isset($update['message']['reply_to_message']['forward_date'])){
    if(isset($update['message']['reply_to_message']['forward_from'])){
        request('copyMessage', [
            'chat_id'      => $update['message']['reply_to_message']['forward_from']['id'],
            'from_chat_id' => ADMIN,
            'message_id'   => $msgId
        ]);
        $msg = 'Sended';
    }else
        $msg = 'The account was hidden by the user';
    request('sendMessage', [
        'chat_id' => ADMIN,
        'text'    => $msg
    ]);
}
?>
