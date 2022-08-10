<?php

ob_start();

$API_KEY = getenv('BOT_TOKEN4');
}

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



$s = str_replace('scan ','',$text);
if($text == "scan $s"){
if(preg_match("/^[0-9]+$/", $s)){
$ok = bot('getchat',['chat_id'=>$s])->ok;
if($ok == "true"){
$get = bot('getchat',['chat_id'=>$s])->result;
$name = $get->first_name;
$user = $get->username;
$bio = $get->bio;
$photo = bot('getUserProfilePhotos',['user_id'=>$s])->result->photos[0][0]->file_id;
$type = bot('sendChatAction' , ['chat_id' =>$s,'action' => 'typing' ,])->ok;
if($type != 1){
$true = "Banned ❗";
}else{
$true = "Unbanned 😁";
}
if($user == null){
$user = "No userName ❗";
}
if($bio == null){
$bio = "No Bio ❗";
}
if($photo == null){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
Sorry you don't have a profile pic
- Mention 🌸 : [$name](tg://user?id=$s)
- User ID 🌸 : $s
- UserName 🌸: *$user*
- UserBio 🌸: [$bio]()
- Status 🌸 : *$true*
",'parse_mode'=>"MarkDown",]);
}else{
bot('sendphoto', [
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>"
- Mention 🌸 : [$name](tg://user?id=$s)
- IDUser 🌸 : $s
- UserName 🌸 : *$user*
- UsetBio 🌸 : [$bio]()
- Status 🌸 : *$true*
",'parse_mode'=>"MarkDown",]);
}
}else{
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
Sorry Can't find the user
",'parse_mode'=>"MarkDown",]);
}
}
}


?>
