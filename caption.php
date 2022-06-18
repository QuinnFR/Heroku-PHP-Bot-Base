<?php

ob_start();
$API_KEY = "5580048221:AAHnbyd7X38XBYUEs6xRh5TJe5GMlY49Wig"; // Add token
echo "api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
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
$update   = json_decode(file_get_contents('php://input'));
$message  = $update->message;
$from_id  = $message->from->id;
$chat_id  = $message->chat->id;
$text     = $message->text;

$caption  = $update->channel_post->caption;
if($update->channel_post){
bot('EditMessageCaption',[
'chat_id'=>$update->channel_post->chat->id,
'message_id'=>$update->channel_post->message_id,
'caption'=>"hi",
]);
}
