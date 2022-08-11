<?php

ini_set('display_errors', 0);
ob_start();
http_response_code(200);
fastcgi_finish_request();

ob_start();

$API_KEY = getenv('BOT_TOKEN3');

define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$user_id = $message->from->id;
$text = $message->text;
$namee = $update->callback_query->from->first_name;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_ID = $update->callback_query->message->message_id;
  $data  = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}
$replyid = $message->reply_to_message->from->id;
$replyname = $message->reply_to_message->from->first_name;
$pm = "<a href='tg://user?id=$replyid'>$replyname</a>";
$message_id = $message->message_id;
$type = $message->chat->type;
$first_name = $message->from->first_name;
$text_inline = $update->inline_qurey->qurey;
$id_inline = $update->inline_query->id;
$title = $message->chat->title;
$caption = $update->message->caption;
$new = $message->new_chat_member;
$new_chat_members = $message->new_chat_member->id;
$is_premium = $message->from->is_premium;
$replyid = $update->message->reply_to_message->message_id;

$edit_chat_id=$update->edited_message->chat->id;
$edit_from_id=$update->edited_message->message->from->id;
$chat_id=$update->message->chat->id;
$from_id=$update->message->from->id;
$re_id= $update->message->reply_to_message->from->id;
$re_name= $update->message->reply_to_message->from->first_name;
$re_usr= $update->message->reply_to_message->from->username;
$reply = $update->message->reply_to_message; $first_name=$update->message->from->first_name;
$username = $update->message->from->username;
$Bots_info= file_get_contents("https://api.telegram.org/bot$API_KEY/getMe");
$json_Bots= json_decode($Bots_info,true); $id_Bot=$json_Bots['result']['id'];
$info= json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id), true);
$suorse=$info['result']['status']; $admins= "administrator"; $managers= "creator"; $infos= json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$edit_chat_id&user_id=".$edit_from_id), true);
$suorses = $infos['result']['status']; $bot = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=$id_Bot"); 
$result=json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getUserProfilePhotos?user_id=$from_id"),true);
$file_id = $result["result"]["photos"][0][0]["file_id"];
$count=$result["result"]["total_count"];


if($text =="/start" and $type == 'private'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Hello $first_name, through the bot, you can send a file from a public channel with the protection feature in your group just use this <code>/send File_link</code>
Only for groups also only admins can use it",
'reply_to_message_id'=>$update->message->message_id,
'parse_mode'=>"HTML",
'reply_markup' => json_encode([
            'inline_keyboard' => [
[['text' => "Add Me ➕️", 'url' =>"http://t.me/Re_Send_File_Bot?startgroup=start"],
['text' => "Dev 👩‍💻", 'url' =>"tg://openmessage?user_id=1136071279"]],
[['text' => "Inline Information ℹ️", 'switch_inline_query_current_chat' =>"How To Use"]],

]]),
]);}


if($text == "/web"){
$hi_text = "Welcome web menu!";
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => $hi_text, 'parse_mode' => 'HTML',
'reply_markup' => json_encode([
'inline_keyboard' => [[[
'text' => "Facebook 📖", 'web_app' => ['url' => 'https://browserleaks.com/ip']], [ 'text' => "Youtube 🔥", 'web_app' => ['url' => 'https://m.youtube.com']]], ] ]) ]); }



$exx = explode("#",$data);
$txtx = str_replace("/send ","",$text);
if($text == "/send $txtx"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $user_id,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>"$txtx",
'caption'=>"$pm
This file for this chat $title",
'reply_to_message_id'=>$message->message_id, 
'parse_mode'=>"HTML",
'protect_content'=>true,
]);
}}


$exxx = explode("#",$data);
$txid = str_replace("/copy ","",$text);
if($text == "/copy $txid"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $user_id,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot('copyMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$chat_id,
'message_id'=>$txid,
'caption'=>"$pm
This file for this chat $title",
'reply_to_message_id'=>$message->message_id, 
'parse_mode'=>"HTML",
'protect_content'=>true,
]);
}}


if($text == "/send https://t.me/TAndroidAPK/149" and $type == 'private' ){
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>"https://t.me/TAndroidAPK/149",
'thumb'=> new CURLFile("img.jpg"),
'caption'=>"This is just a simple example of replying to a user with the protection feature activated BTW I'm workingin public groups only :(",
'reply_to_message_id'=>$message->message_id, 
'parse_mode'=>"HTML",
'protect_content'=>true,
]);
bot('ForwardMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>-1001579447888,
'message_id'=>2,
]);
}

if($text == "/s" and $type == 'private' ){
bot('sendDocument', [
'chat_id' => $chat_id,
 'document' =>new CURLFile("img.jpg"),
'caption' => "local yuborilgan document file",
'thumb' => new CURLFile("img.jpg"),
]);
}


if($message->sender_chat->type == "channel"){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('banChatSenderChat',[
'chat_id'=>$chat_id,
'sender_chat_id'=>$message->sender_chat->id
]);
}




$text_portect = str_replace("/po ","",$text);
if($text == "/po $text_portect"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $user_id,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
bot('sendmessage', [
'chat_id' => $chat_id,
'from_chat_id'=>$chat_id,
'text'=>$text_portect,
'reply_to_message_id'=>$message->message_id, 
'parse_mode'=>"markdownV2",
'protect_content'=>true,
]);
}}


if($text == "H" ){
$gg = bot('sendMessage', [
'chat_id' =>$chat_id,
'text' => "How you got link for this group",
'parse_mode' => 'HTML',
'reply_to_message_id'=>$message->message_id, 
'reply_markup' => json_encode([
'force_reply' => true,
'input_field_placeholder' =>
"Type your answer...", 
'selective' => true,])])->result->message_id;
sleep(10);
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$gg,
]);
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' => "Thanks",
'parse_mode' => 'HTML',
'reply_to_message_id'=>$gg +1,]);
}


if(isset($update->message->new_chat_member )){
$nn = bot('sendMessage', [
'chat_id' =>$chat_id,
'text' => "How you got link for this group",
'parse_mode' => 'HTML',
'reply_to_message_id'=>$message->message_id,
'reply_markup' => json_encode([
'force_reply' => true,
'input_field_placeholder' =>
"Type your answer...",
'selective' => true,])])->result->message_id;
sleep(10);
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$nn,
]);
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' => "Thanks",
'parse_mode' => 'HTML',
'reply_to_message_id'=>$nn +1,]);
}



if($update->message){
$ok = bot('getchat',['chat_id'=>$user_id])->ok;
if($ok == "true"){
$get = bot('getchat',['chat_id'=>$user_id])->result;
$name = $get->first_name;
$bio = $get->bio;
$photo = bot('getUserProfilePhotos',['user_id'=>$user_id])->result->photos[0][0]->file_id;

if($bio == null){
$bio = "No Bio ❗";
}
if($photo == null){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
Sorry you don't have a profile pic please add Profile Pic
- Mention: [$name](tg://user?id=$user_id)
- User ID: $s
- UserName: $user
- UserBio: [$bio]()
",'parse_mode'=>"MarkDown",]);
}else{
bot('sendphoto', [
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>"
- Mention: [$name](tg://user?id=$s)
- IDUser: $user_id
- UserName: $user
- UsetBio: [$bio]()
 - your pic $count
",'parse_mode'=>"MarkDown",]);
}
}else{
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
Sorry Can't find the user
",'parse_mode'=>"MarkDown",]);
}}

if($text == "Hi" and $is_premium){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
}


?>
