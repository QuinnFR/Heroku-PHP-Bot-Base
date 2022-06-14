
<?php
ini_set('display_errors', 0);
ob_start();
http_response_code(200);
fastcgi_finish_request();


if (empty(getenv('BOT_TOKEN2'))){
$token = "API_Token";
} else {
$token = getenv('BOT_TOKEN2');
}
if (empty(getenv('ADMIN2'))){
$ADMIN = "ID_ADMIN";
} else {
$ADMIN = getenv('ADMIN2');
}
if (empty(getenv('Channel_ID2'))){
$Channel_ID = "Channel_ID";
} else {
$Channel_ID = getenv('Channel_ID2');
}

$input = file_get_contents('php://input');
$update = json_decode($input);

include 'class/Telegram.class.php';
include 'iTelegram.php';
include 'inline.php';
include 'messages.php';

$telegram = new Telegram($token);
$message = $update->message;
$chat_id = $message->chat->id;
$user_id = $message->from->id;
$message_id = $message->message_id;
$text = $message->text;
$type = $message->chat->type;
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
$text = $update->message->text;
$mid = $update->message->message_id;
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
$random_msg_top = array("Only the Root not free :)","invite your friends 🧡","If you linked tell us 💛");
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
$lang = $message->from->language_code;
$owner = "1987049771";



$cn = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Chinese Website 🇨🇳','url'=>'http://website.vmos.cn/vmospro/website/index'],
           ['text'=>'Update in PM','url'=>'http://t.me/Black_Widow_Robot?start=update']],
           [['text'=>'Delete 🗑','callback_data'=>'Delete']]]]);


$welcome_key = json_encode([
           'inline_keyboard'=>[
           [['text'=>'My Group 💬','url'=>'https://t.me/Community_Ideas'],
           ['text'=>'Read This 📚','url'=>'https://t.me/Community_Ideas/107']],
           [['text'=>'Games 🎮','callback_data'=>'Games'],
           ['text'=>'Apps 📲','callback_data'=>'Apps']]]]);

$join_key = json_encode([
           'inline_keyboard'=>[
           [['text'=>'VMOS Official 💥','url'=>'https://t.me/vmosofficial'],
           ['text'=>'VMOS FAQ❓️','url'=>'https://t.me/Frequently_Asked_Question']],
           [['text'=>'Support Chat 💬','url'=>'https://t.me/VMOS_Support_Chat_Official']]]]);

$sorry = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$owner);
if($type == 'group' or $type == 'supergroup' && (strpos($sorry,'"status":"left"') or strpos($sorry,'"Bad Request: USER_ID_INVALID"') or strpos($sorry,'"status":"kicked"'))!== false){
$telegram->typing($chat_id, $action = 'typing');
sleep(2);
$pin_not = $telegram->sendMessage($chat_id, $text = $leave, $replyMarkup = $join_key)->result->message_id;
sleep(3);
$telegram->pin($chat_id, $message_id = $pin_not);
$telegram->leaveChat($chat_id);
return false;}

$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$Channel_ID&user_id=".$from_id);
if($text == '/start' && $type == 'private' && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
$telegram->typing($chat_id, $action = 'typing');
sleep(2);
$telegram->sendMessage($chat_id, $text = $welcome_first, $replyMarkup = $join_key)->result->message_id;
return false;}


if($text == '/start' && $type == 'private'){
$telegram->unpin($chat_id);
    $telegram->typing($chat_id, $action = 'typing');
sleep(2);
$wl = $telegram->sendMessage($chat_id, $text = "Well, since you've joined, let's get started 🙂", $replyMarkup = $null)->result->message_id;
sleep(3);
$pin = $telegram->editMessageText($chat_id, $message_id = $wl, $text = $welcome, $replyMarkup = $welcome_key)->result->message_id;
$telegram->pin($chat_id, $message_id = $pin);
}

if($new){
$telegram->Mute_New_Chat_Members($chat_id, $new_chat_member_id, $time);}

$pm = "Please <a href='tg://user?id=$user_id'>$first_name</a> click here";

if(isset($update) && $data == "Games"){
$games = json_encode([
           'inline_keyboard'=>[
           [["text"=>"PUBG Mobile","callback_data"=>"PUBG"],
           ["text"=>"Android 11 and less","callback_data"=>"11"]],
           [["text"=>"Share 🗑","url"=>"http://t.me/share/url?url=I'm%20Black%20Widow%20Helper%20of%20VMOS%20Group%0AMade%20by%20Русская%20девушка%20🇷🇺%0ALink:%0Ahttp://t.me/Black_Widow_Robot"],
           ["text"=>"Delete","callback_data"=>"Delete"]]]]);

$telegram->alret($alretcall, $text = "new version of public games 🎮", $showAlert = false);
$telegram->sendMessage($chat_id = $chatid, $text = "Please Choice your game", $replyMarkup = $games);
}

if(isset($update) && $data == "Apps"){
$apps = json_encode([
           'inline_keyboard'=>[
           [["text"=>"Communications 💬","callback_data"=>"Architectural"],
           ["text"=>"Android 11 and less","callback_data"=>"11"]],
           [["text"=>"Share 🗑","url"=>"http://t.me/share/url?url=I'm%20Black%20Widow%20Helper%20of%20VMOS%20Group%0AMade%20by%20Русская%20девушка%20🇷🇺%0ALink:%0Ahttp://t.me/Black_Widow_Robot"],
           ["text"=>"Delete","callback_data"=>"Delete"]]]]);

$telegram->alret($alretcall, $text = "Apps 📲", $showAlert = false);
$telegram->sendMessage($chat_id = $chatid, $text = "Please Choice your apps", $replyMarkup = $apps);
}

if(isset($update) && $data == "Architectural"){
$arm = json_encode([
           'inline_keyboard'=>[
           [["text"=>"ARMv7","callback_data"=>"Communications ARMv7"],
           ["text"=>"ARMv8","callback_data"=>"Communications ARMv8"]]]]);

$telegram->alret($alretcall, $text = "ARM Version", $showAlert = false);
$telegram->editMessageText($chat_id = $chatid, $message_id = $messageid, $text = "The ARMv7 architecture is the basis for all current 32-bit ARM Cortex™ processors, including the Cortex-A15 and Cortex-A9 processors. The ARMv8 architecture is the first ARM architecture that includes 64-bit execution, enabling processors based on the architecture to combine 64-bit execution with 32-bit execution.", $replyMarkup = $arm);
}

if(isset($update) && $data == "PUBG"){
$telegram->sendDocument($chat_id = $chatid, $document = "BQACAgQAAxkBAAIBNWKoBJvmKyAg6a-kXuHm3SF43QnrAAJwEQACt1AYUb0hq-Y-e9i5JAQ", $caption = "PUBG Mobile from the official website\nBy: $firstname\nTime: $new_time", $replyMarkup = $games);}

if(isset($update) && $data == "Communications ARMv7"){
$media = [[
       'type' => 'document', 'media' => 'https://t.me/', 'caption'=>'Caption'],
      ['type' => 'document', 'media' => 'https://t.me/', 'caption'=>'Caption']];
$telegram->sendMediaGroup($chat_id = $chatid, $media, $disable_notification = null, $reply_to_message_id = $message_id);}

if($text == "/file"){
$media = [[
       'type' => 'document', 'media' => 'https://t.me/', 'caption'=>'Caption'],
      ['type' => 'document', 'media' => 'https://t.me/', 'caption'=>'Caption']];
$telegram->sendMediaGroup($chat_id, $media, $disable_notification = null, $reply_to_message_id = null);}
                            
if($data == "11"){
$telegram->alret($alretcall, $text = "For Android devices 📱", $showAlert = false);
$telegram->sendDocument($chat_id = $chatid, $document = "https://t.me/VMOS_Apks/10", $caption = $vmos_pro, $replyMarkup = $os);}



if($text == '/vmos' || $text == '/vmos@Community_Ideas_Robot'){
$telegram->typing($chat_id, $action = 'typing');
sleep(2);
$telegram->sendMessage($chat_id, $text = $pm, $replyMarkup = $cn);}

elseif(preg_match("/(last|update)/", $text) && $type =='private'){
$telegram->typing($chat_id, $action = 'document');
sleep(2);
$telegram->sendDocument($chat_id, $document = "https://t.me/VMOS_Apks/11", $caption = $caption, $replyMarkup = null);
$telegram->sendsticker($chat_id, $sticker="CAACAgQAAxkBAAEQSq9ip0h8-pJzKJyI2rtaYY1c_2J75wAC_gEAAg8joS_fWZ-AqhWQhiQE", $replyMarkup = null);}

if($data == "Delete"){
$telegram->alret($alretcall, $text = "OK Delete 🗑", $showAlert = false);
$telegram->Delete($chat_id = $chatid, $message_id = $messageid);}


if($text =='/json' and $re){
$telegram->jsonData($chat_id, $text = json_encode($update, 448));}

if($text == "/members"){
        $telegram->sendMessage($chat_id, $text = "The number of group members: $count_members", $replyMarkup = $key);}


if($text == "/member"){
$st = $telegram->getChatMember($chat_id, $user_id);
	if($st->result->status == 'creator' || $st -> result -> status == 'administrator'){
        $telegram->sendMessage($chat_id, $text = "The number of group members: $count_members", $replyMarkup = $key);}}

if(in_array($st->result->status??"",["administrator","creator"])){
if($text == "/check"){
  $telegram->sendMessage($chat_id, $text = 'Hello');
}}

if($text == '/key'){
$telegram->sendMessageInlineKeyboard($chat_id, $text = "$day $clock $new_time", $replyMarkup = null);}



?>
