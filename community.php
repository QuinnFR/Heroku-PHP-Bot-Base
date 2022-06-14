
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
include 'variables.php';


$cn = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Chinese Website 🇨🇳','url'=>'http://website.vmos.cn/vmospro/website/index'],
           ['text'=>'Update in PM','url'=>'http://t.me/Black_Widow_Robot?start=update']],
           [['text'=>'Delete 🗑','callback_data'=>'Delete']]]]);


$welcome_key = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Pin Message 📌','url'=>'https://t.me/VMOS_Support_Chat_Official/252832'],
           ['text'=>'Read This 📚','url'=>'http://t.me/MissRose_bot?start=notes_-1001393155887_415742']],
           [['text'=>'Hashtags #️⃣','url'=>'https://t.me/VMOS_Support_Chat_Official/252834'],
           ['text'=>'VMOS Versions 🆚️','callback_data'=>'versions']]]]);

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
$telegram->sendMessage($chat_id, $text = $welcome_vmos, $replyMarkup = $join_key)->result->message_id;
return false;}


if($text == '/start' && $type == 'private'){
$telegram->unpin($chat_id);
    $telegram->typing($chat_id, $action = 'typing');
sleep(2);
$wl = $telegram->sendMessage($chat_id, $text = "Well, since you've joined, let's get started 🙂", $replyMarkup = $null)->result->message_id;
sleep(3);
$pin = $telegram->editMessageText($chat_id, $message_id = $wl, $text = $welcome, $replyMarkup = $welcome_key)->result->message_id;
sleep(3);
$telegram->pin($chat_id, $message_id = $pin);
}

if($new){
$telegram->Mute_New_Chat_Members($chat_id, $new_chat_member_id, $time);}

$pm = "Please <a href='tg://user?id=$user_id'>$first_name</a> click here";
$chinese_vmos = "<a href='tg://user?id=$user_id'>$frist_name</a> VMOS Chinese Version 🇨🇳 Support Root and Gapps but Android 5.1
Android OS: 5.1
Features:
                 1. Root
                 2. Gapps
                 3. Free no need to pay";


           

if($text == "/keyboard" && $type =='private'){
$os = json_encode([
           'inline_keyboard'=>[
           [["text"=>"Android 12 🤖","callback_data"=>"12"],
           ["text"=>"Android 11 and less","callback_data"=>"11"]],
           [["text"=>"Share 🗑","url"=>"http://t.me/share/url?url=I'm%20Black%20Widow%20Helper%20of%20VMOS%20Group%0AMade%20by%20Русская%20девушка%20🇷🇺%0ALink:%0Ahttp://t.me/Black_Widow_Robot"],
           ["text"=>"Delete","callback_data"=>"Delete"]]]]);
$telegram->typing($chat_id, $action = 'typing');
sleep(2);
$telegram->sendMessageInlineKeyboard($chat_id, $text = "Please Choice your os Android System", $replyMarkup = $os);}
if(isset($update) && $data == "12"){
$telegram->alret($alretcall, $text = "For Android 12 Only Assistant app 📱", $showAlert = false);
$telegram->editMessageText($chat_id = $chatid, $message_id = $messageid, $text = $os12, $replyMarkup = $os);}


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
