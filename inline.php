<?php
include("Telegram-inline.php");

// Set the bot TOKEN
$bot_id = "5072808300:AAE2izT4p_5xBZjx8YDE4lSYUv-OyzduT4I";

// Instances the class
$telegram = new Inline($bot_id);

date_default_timezone_set("Asia/Tehran"); 

$inline_query_id = $telegram->Inline_Query_ID();
$inline_query_text = $telegram->Inline_Query_Text();
$msgType = $telegram->getUpdateType();

if($msgType == 'inline_query'){
	
	if(!empty($inline_query_text)){
		
		$results = array(
			array(
				"type" => "article",
				"id" => "1",
				"title" => "Content Title",
				"description" => "short story...",
				"message_text" => "Message will shown to user after they clicked on title",
				"url" => "https://en.wikipedia.org/wiki/Fifa",
				"thumb_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/FIFA_Logo_%282010%29.svg/440px-FIFA_Logo_%282010%29.svg.png",
                                "parse_mode" => 'HTML',
                                "reply_markup" => [
                                'inline_keyboard' =>[
                              [['text'=>'Inline','callback_data'=>'ce'],
                              ['text'=>'OK','callback_data'=>'co']]]]),
			array(
				"type" => "article",
				"id" => "2",
				"title" => "Content Title 2",
				"description" => "short story...",
				"message_text" => "Message will shown to user after they clicked on title 2",
				"url" => "https://en.wikipedia.org/wiki/iran",
				"thumb_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Flag_of_Iran.svg/250px-Flag_of_Iran.svg.png",
                                "parse_mode" => 'HTML',
                                "reply_markup" => [
                                'inline_keyboard' =>[
                              [['text'=>'Inline','callback_data'=>'ce'],
                              ['text'=>'OK','callback_data'=>'co']]]]));
		$results = json_encode($results);

		$content = array('inline_query_id' => $inline_query_id, "results" => $results);
		$telegram->answerInlineQuery($content);		
	}
	
}
 
