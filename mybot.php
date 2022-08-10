<?php

ob_start();

if (empty(getenv('BOT_TOKEN2'))){
$token = "5557739897:AAG0HzPPxXul_uydv8vJUC3HhGWLyuJiNho";
} else {
$token = getenv('BOT_TOKEN2');
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


define('API_KEY',$token);
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

include "messages.php";
include "Telegram.php";
include "random.php";


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
- Mention 🌸 :
[$name](tg://user?id=$s)
- User ID 🌸 :
$s
- UserName 🌸:
<code>@$user</code>
- UserBio 🌸:
$bio
- Status 🌸 : $true
",'parse_mode'=>"HTML",]);
}else{
bot('sendphoto', [
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>"
- Mention 🌸 :
[$name](tg://user?id=$s)
- IDUser 🌸 :
$s
- UserName 🌸 :
*$user*
- UsetBio 🌸 :
[$bio]()
- Status 🌸 :
$true
",'parse_mode'=>"MarkDown",]);}
}else{
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
Sorry Can't find the user
",'parse_mode'=>"MarkDown",]);}}}

?>
