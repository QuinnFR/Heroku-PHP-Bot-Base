<?php
ini_set('display_errors', 0);


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
