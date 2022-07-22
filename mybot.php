<?php
 ob_start();



/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * https://github.com/Eleirbag89/TelegramBotPHP
 */

include("TelegramLib.php");

// Set the bot TOKEN

if (empty(getenv('BOT_TOKEN_Web'))){
$tokenweb = "API_Token";
} else {
$tokenweb = getenv('BOT_TOKEN_Web');
}


// Instances the class
$telegram = new Telegram($tokenweb);

// Take text and chat_id from the message
$text 			   = $telegram->Text();
$chat_id 		   = $telegram->ChatID();
$user_id		   = $telegram->UserID();
$username 		   = $telegram->Username();
$name 		  	   = $telegram->FirstName();
$family 		   = $telegram->LastName();
$fullName		   =  $name.' '.$family;

$message_id 	   = $telegram->MessageID(); 

$msgType = $telegram->getUpdateType();


if(strtolower($text) == 'test'){
      $web_app = (object)['url' => "https://www.google.com"];

	$option = array( 
		array(
			$telegram->buildWebAppInlineKeyboardButton("♻️ باز کردن صفحه!", $web_app),
		)
	);
	$keyb = $telegram->buildInlineKeyBoardButton($option, $resize_keyboard =true);

	$finishText = 'Show Me!';

	$content = array('chat_id' => $user_id, 'message_id' => $message_id, 'text' => $finishText, 'reply_markup' => $keyb, 'resize_keyboard'=> true]);
	$telegram->sendMessage($content);
}
