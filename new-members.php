<?php
  $update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id2 = $update->callback_query->message->chat->id;
$from_id2 = $update->callback_query->from->id; 
$message_id2 = $update->callback_query->message->message_id;
$new = $message->new_chat_member;
$newid = $new->id;
$newn = $new->first_name;
if($new){
bot('sendMessage', [
'chat_id' =>$chat_id,
'text' =>"Honey [$newn](tg://user?id=$newid)
Click you're not a robot",'reply_to_message_id'=>$message->message_id, 'parse_mode' =>"markdown", 
'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [['text'=>"Yes",'callback_data'=>"yes#$newid"],['text'=>"No",'callback_data'=>"no##$newid"]]
                ]
                ])
            ]);
bot('restrictChatMember',[
        'chat_id'=>$chat_id,
        'user_id'=>$newid
      ]);
}
$ex = explode("#", $data);
$dat1 = $ex[0];
$nid = $ex[1];
if($dat1 == "yes"){
if($from_id2 == $nid){
bot('promoteChatMember',[
'chat_id'=>$chat_id2,
'user_id'=>$nid,
'can_send_messages'=>true,
]); 
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
   'text'=>"You been unmute", 
 'show_alert'=>true,
]);
bot('deleteMessage', [
'chat_id' =>$chat_id2,
'message_id' =>$message_id2,
]);
}}


if($dat1 == "yes"){
if($from_id2 != $nid){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
   'text'=>"it's not for you", 
 'show_alert'=>true,
]);
}} 

$ex = explode("##", $data);
$dat2 = $ex[0];
$nid = $ex[1];


if($dat2 == "no"){
if($from_id2 == $nid){
bot('kickChatMember', [
'chat_id' =>$chat_id2,
'user_id'=>$nid
]);
bot('deleteMessage', [
'chat_id' =>$chat_id2,
'message_id' =>$message_id2,
]);
}} 

if($dat2 == "no"){
if($from_id2 != $nid){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
   'text'=>"It's not for you", 
 'show_alert'=>true,
]);
}}
?>
