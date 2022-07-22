<?php
 ob_start();



/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * https://github.com/Eleirbag89/TelegramBotPHP
 */

include("TelegramLib.php");

// Set the bot TOKEN

$bot_id = "5364973799:AAGu_VCuqUKj9ybcv6hy7Pki18StoT1mTqU";


// Instances the class
$telegram = new Telegram($bot_id);

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

	$keyb = $telegram->buildKeyBoard($option);

	$finishText = 'Show Me!';

	$content = array('chat_id' => $user_id, 'message_id' => $message_id, 'text' => $finishText, 'reply_markup' => $keyb);
	$telegram->sendMessage($content);
}
