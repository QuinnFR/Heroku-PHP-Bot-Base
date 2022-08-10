<?php
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

if($text_inline == 'Hi'){
    bot('answerInlineQuery', 
        [
            'inline_query_id' => $id_inline,
            'cache_time'=>'150', 
            'results' => json_encode(
            [[
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
            ]]
            )
        ]
    );
}

if($text_inline == 'How To Use'){
    bot('answerInlineQuery', 
        [
            'inline_query_id' => $id_inline,
            'cache_time'=>'150', 
            'results' => json_encode(
            [[
                'type' => 'article',
                'id' =>'1',
                'thumb_url'=>"https://telegra.ph/file/643f15e9f34f59e7cea10.jpg",
                'title' => "Example ?",
                'description'=>"Just a small Example how to use me",
                'url'=> "https://t.me/TAndroidAPK",
                'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "/send https://t.me/TAndroidAPK/149"],
            ],
  [
            'type'=> 'photo',
            'id'=> '2',
            'photo_url'=> "https://st.depositphotos.com/1010683/1389/i/450/depositphotos_13895290-stock-photo-giant-panda-bear-eating-bamboo.jpg",
            'photo_width' => 600,
            'photo_height' => 400,
            'title'=> "Ochko'z panda 2022",
            'caption'=> "Pandani rasmi 29.05.22",
            'parse_mode'=> "HTML",
            'description' => 'Pandachani rasmchasi',
            'thumb_url' => 'https://st.depositphotos.com/1010683/1389/i/450/depositphotos_13895290-stock-photo-giant-panda-bear-eating-bamboo.jpg',
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => "Do'stlarga ulashish", 'switch_inline_query' => "chatbot"]
                    ],
                    [
                        ['text' => "Barcha videolarni ko'rish", 'switch_inline_query_current_chat' => "videolar"]
                    ]
                ]
            ]
        ],
[
            'type'=> 'video',
            'id'=>'3',
            'video_url'=> "https://mproweb.uz/YTless/tgramApi/myvideo.mp4",
            'mime_type'=> "video/mp4",
            'title'=> "Test video",
            'caption'=> "inlinebotdan video",
            'parse_mode'=> "HTML",
            'description' => 'qiziqarli video',

            'thumb_url' => 'https://itiq.ps/wp-content/uploads/2021/10/youtube-video-titles.jpg',
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => "Do'stlarga ulashish", 'switch_inline_query' => "chatbot"]
                    ],
                    [
                        ['text' => "Barcha videolarni ko'rish", 'switch_inline_query_current_chat' => "videolar"]
                    ]
                ]
            ]
        ],
        [
            'type'=> 'audio',
            'id'=>'4',
            'audio_url'=> "https://t.me/EstryBots/5",
            'title'=> "Test audio",
            'caption'=> "inlinebotdan audio",
            'parse_mode'=> "HTML",
            'performer' => 'Katta hofiz',

            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => "Do'stlarga ulashish", 'switch_inline_query' => "chatbot"]
                    ],
                    [
                        ['text' => "Barcha videolarni ko'rish", 'switch_inline_query_current_chat' => "videolar"]
                    ]
                ]
            ]
        ],
        [
            'type'=> 'document',
            'id'=>'5',
            'document_url'=> "https://mproweb.uz/YTless/tgramApi/file.pdf",
            'title'=> "Test document",
            'caption'=> "inlinebotdan document",
            'parse_mode'=> "HTML",
            'mime_type' => 'application/pdf',
            'description' => 'May oyi hisobotlari',
        ],        

[
                'type' => 'article',
                'id' =>'6',
                'thumb_url'=>"https://telegra.ph/file/8e7dbef60b2ec4d1490cf.jpg",
                'title' => "Copy any message in your group",
                'description'=>"Resend a message with protection feature",
                'url'=> "https://telegra.ph/file/8e7dbef60b2ec4d1490cf.jpg",
                'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "Just reply to any user with the message ID number for the file like /copy 353325"],
            ]]
            )
        ]
    );
}


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


if($text == "/newfile"){
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "<pre>Shaxsiy FileCloudga file qo'shish uchun istalgan fileni shu xabarga javob tariqasida yuboring, yoki file yuborishda ostida #addfile hashtagini qoldiring !!!</pre>",
'parse_mode' => 'HTML',
'reply_to_message_id'=>$message->message_id, 
'reply_markup' => json_encode([
'force_reply' => true,
'input_field_placeholder' =>
"Fileni tanlang yoki chatga tashlang...",
'selective' => true,]) ]);}


if(isset($update->message->new_chat_member )){
$nn = bot('sendMessage', [
'chat_id' =>$chat_id,
'text' => "How you got link for this group",
'parse_mode' => 'HTML',
'reply_markup' => json_encode([
'force_reply' => true,
'input_field_placeholder' =>
"Type your answer...",
'selective' => true,]) ])->result->message_id;
sleep(10);
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$nn,
]);
}



if($update->message){
$ok = bot('getchat',['chat_id'=>$user_id])->ok;
if($ok == "true"){
$get = bot('getchat',['chat_id'=>$user_id])->result;
$name = $get->first_name;
$user = $get->username;
$bio = $get->bio;
$photo = bot('getUserProfilePhotos',['user_id'=>$user_id])->result->photos[0][0]->file_id;
$type = bot('sendChatAction' , ['chat_id' =>$user_id,'action' => 'typing' ,])->ok;
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
- Status: $true
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
- Status: $true
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
