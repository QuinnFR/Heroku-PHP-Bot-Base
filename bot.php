<?php
ini_set('display_errors', 0);

if (empty(getenv('BOT_TOKEN'))){
$token = "API_Token";
} else {
$token = getenv('BOT_TOKEN');
}
if (empty(getenv('ADMIN'))){
$ADMIN = "ID_ADMIN";
} else {
$ADMIN = getenv('ADMIN');
}
if (empty(getenv('Channel_ID'))){
$Channel_ID = "Channel_ID";
} else {
$Channel_ID = getenv('Channel_ID');
}

$input = file_get_contents('php://input');
$update = json_decode($input);
$telegram = new Telegram($token);
$chatId = $update['message']['chat']['id'] ?? $update['callback_query']['message']['chat']['id'] ?? '';

register_shutdown_function(function () use($token, $chatId) {
  if(http_response_code() != 200) {
    http_response_code(200);

    if($token && $chatId) {
      file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
        'chat_id' => $chatId,
        'text' => 'An internal server error has occurred. Please try again later.',
      ]));
    }
  }
});

include __DIR__ . '/main.php';




?>
