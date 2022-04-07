<?php
http_response_code(200);
fastcgi_finish_request();

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

ob_start();

include 'iTelegram.php';
include 'class/Telegram.class.php';

$admin = "1136071279"; 
//Enter your id number
$input = file_get_contents('php://input');
$update = json_decode($input);
$telegram = new Telegram($token);
$message = $update->message;
$chat_id = $message->chat->id;
$user_id = $message->from->id;
$message_id = $message->message_id;
$text = $message->text;
$type = $message->chat->type;
$message->from->first_name;
$user = $message->from->username;
$reply= $message->reply_to_message->text;
$replyid = $message->reply_to_message->from->id;
$replyname = $message->reply_to_message->from->first_name;
$title = $message->chat->title;

$call = $update->callback_query;
$mes = $call->message;
$dataa = $call->data;
$qid = $call->id;
$callcid = $message->chat->id;
$message_re_id = $message->message_id;
$callfrid = $call->from->id;
$calluser = $mes->chat->username;
$callfname = $call->from->first_name;

$new = $message->new_chat_member;
$new_id = $new->id;
$new_name = $new->first_name;
$left = $message->left_chat_member;

$soat = date("H:i:s", strtotime("2 hour"));
$sana = date("d.m.y", strtotime("2 hour"));

$usernamebot = "";
$message = $update->message;
$message_text = $update ->message->text;
$from_id = $message->from->id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$firstname = $update->callback_query->from->first_name;
$usernames = $update->callback_query->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$membercall = $update->callback_query->id;
$reply = $update->message->reply_to_message->forward_from->id;
$data = $update->callback_query->data;
$dataa = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$chat_type = $update->message->chat->type;
$gpname = $update->callback_query->message->chat->title;
$namegroup = $update->message->chat->title;
$text_inlinee = $update->inline_qurey->qurey;
$text_inline = $update->inline_query->query;
$inline_query_id = $update->inline_query->id;
$new_chat_member_id = $update->message->new_chat_member->id;
$newchatmemberu = $update->message->new_chat_member->username;
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$tedadmsg = $update->message->message_id;
$edit = $update->edited_message->text;
$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_msgid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$message_edit_id = $update->edited_message->message_id;
$chat_edit_id = $update->edited_message->chat->id;
$edit_for_id = $update->edited_message->from->id;
$edit_chatid = $update->callback_query->edited_message->chat->id;
$caption = $update->message->caption;
$chatid3=$update->message->chat->id;
$fromid3=$update->message->from->id;
$text = $update->message->text;
$mid = $update->message->message_id;
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$firstname = $update->callback_query->from->first_name;
$usernames = $update->callback_query->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$alretcall = $update->callback_query->id;
$forward_from_chat = $update->message->forward_from_chat;
$from_chat_id = $forward_from_chat->id;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$forward_from = $update->message->forward_from;
$forward_from_id = $forward_from->id;
$forward_from_username = $forward_from->username;
$reply = $update->message->reply_to_message->forward_from->id;
$caption = $update->message->caption;
$re = $update->message->reply_to_message;
$from_id = $message->from->id;
$is_bot = $message->new_chat_member->is_bot;
$time = strtotime("+5 minutes");
$count = $us->result;
$day = date('d-M Y',strtotime('0 hour'));
$clock = date('H:i', strtotime('0 hour'));
$new_time = date("Y-m-d H:i:s", strtotime('+0 hours'));
$channel = "";
$random_msg_top = array("Hello 👋","Thanks for using me 💛");
$Random = $random_msg_top[array_rand($random_msg_top,1)];
$caption = $message->caption;
$document = $message->document; 
$animation = $message->animation;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$photo_id = $message->photo[0]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$voice_id = $message->voice->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
$mention = "<a href='tg://user?id=$from_id'>$first_name</a>";
$url_count = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMembersCount?chat_id=$chat_id"),true);
$count_members = $url_count ['result'];

$in = [[
                'type' => 'article',
                'id' =>base64_encode(rand(5,555)),
                'thumb_url'=>"https://telegra.ph/file/aeff14fd95fcb41429a36.jpg",
                'title' => "Title",
                'description'=>"How to download our app?",
                'url'=> "https://www.vmod.com",
                'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "hello"],
                'reply_markup' => [
                'inline_keyboard' => [
                        [
                            ['text' => "ok", 'switch_inline_query' => "switch"],['text' => "ok", 'switch_inline_query' => "switch"]
                        ]]]
            ],[
                'type' => 'article',
                'id' =>base64_encode(rand(5,555)),
                'thumb_url'=>"https://telegra.ph/file/aeff14fd95fcb41429a36.jpg",
                'title' => "Explain",
                'description'=>"PGT+ app",
                'url'=> "https://www.google.com",
                'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "hello"],
                'reply_markup' => [
                'inline_keyboard' => [
                        [
                            ['text' => "ok", 'switch_inline_query_current_chat' => "switch"],['text' => "ok", 'switch_inline_query_current_chat' => "switch"]
                        ]]]
            ]];
if($text_inline == 'try'){
$telegram->answerInlineQuery($inline_query_id, $results = $in, $cache_time = 0, $is_personal = false, $next_offset = null, $switch_pm_text = null, $switch_pm_parameter = null);}


?>
