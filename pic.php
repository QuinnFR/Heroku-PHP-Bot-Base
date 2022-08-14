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

include 'class/Telegram.class.php';
include 'messages.php';


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
$owner = "1987049771";
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

$join_key = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Join to Community & Ideas 💻🧠','url'=>'https://t.me/+WSXAm6DJiKw2MDVk'],
           ['text'=>'Dev 👩‍💻','url'=>'tg://openmessage?user_id=1987049771']],
           [['text'=>'Share 🔗','url'=>'https://telegram.me/share/url?url=&text=This%20bot%20has%20been%20development%20by%20OwO%20%F0%9F%A6%8B%20Misa%20Amane%20%F0%9F%A6%8B%20UwU%0AIf%20you%20like%20it%2C%20share%20it%20%3A%29%0Ahttps%3A%2F%2Ft.me%2FCommunity_Ideas_Robot']]]]);


$sorry = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$owner);
if($type == 'group' or $type == 'supergroup' && (strpos($sorry,'"status":"left"') or strpos($sorry,'"Bad Request: USER_ID_INVALID"') or strpos($sorry,'"status":"kicked"'))!== false){
bot('sendChatAction', [
  'chat_id'=>$chat_id,
  'action'=>'typing',  
]);
sleep(2);
$pin_not = bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>$leave,
'parse_mode'=>"HTML",
'reply_markup' => $join_key,
])->result->message_id;
sleep(3);
bot('pinChatMessage',[
'chat_id'=>$chat_id,
'text'=>$pin_not,
])->result->message_id;
bot('LeaveChat',[
'chat_id'=>$chat_id,
]);
return false;}

    if($text =="/startt" and $type == 'private'){
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
          'caption'=>"$pm\nThis file for this chat $title",
          'reply_to_message_id'=>$message->message_id, 
          'parse_mode'=>"HTML",
          'protect_content'=>true,
]);
}}

    if($message->sender_chat->typee == "channel"){
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


if($text == "H76" ){
    $gg = bot('sendMessage', [
          'chat_id' =>$chat_id,
          'text' => "How you got link for this group",
          'parse_mode' => 'HTML',
          'reply_to_message_id'=>$message->message_id, 
          'reply_markup' => json_encode([
          'force_reply' => true,
          'input_field_placeholder' => "Type your answer...", 
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


if(isset($update->message->new_chat )){
     $nn = bot('sendMessage', [
          'chat_id' =>$chat_id,
          'text' => "How you got link for this group",
          'parse_mode' => 'HTML',
          'reply_to_message_id'=>$message->message_id,
          'reply_markup' => json_encode([
          'force_reply' => true,
          'input_field_placeholder' => "Type your answer...",
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
   $sorry_profile = bot('sendMessage', [
          'chat_id'=>$chat_id,
          'text'=>"Sorry you don't have a profile pic please add Profile Pic\nMention: [$name](tg://user?id=$user_id)\nYour Bio: [$bio]()",
'parse_mode'=>"MarkDown",])->result->message_id;
sleep(20);
bot('deletemessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$sorry_profile,
]);
}
}}



 if($new){
  $wlcome_pic = bot('sendphoto', [
          'chat_id'=>$chat_id,
          'photo'=>$photo,
          'caption'=>"[$name](tg://user?id=$s)\n[$bio]()\nPhotos on your profile: $count",
          'parse_mode'=>"MarkDown",])->result->message_id;
 sleep(20);
   bot('deletemessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$wlcome_pic,
]);
}

if($text == "Hi" and $is_premium){
   bot('deletemessage',[
          'chat_id'=>$chat_id,
          'message_id'=>$message->message_id,
]);
}


?>
