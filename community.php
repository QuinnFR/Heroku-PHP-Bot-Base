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
$random_msg_top = array("Share the bot with your frinds :)","invite your friends 🧡","If you linked tell us 💛");
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
$bannedd = array("1622270145", "21279152", "575505287", "154021101", "2126768633", "5367656309", "5310401468"); 
$banned = array("16222765545", "65662627"); 

$caption_cn = $update->channel_post->caption;
$id_cn = $update->channel_post->chat->id;
$message_id_cn = $update->channel_post->message_id;

$cn = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Chinese Website 🇨🇳','url'=>'http://website.vmos.cn/vmospro/website/index'],
           ['text'=>'Update in PM','url'=>'http://t.me/Black_Widow_Robot?start=update']],
           [['text'=>'Delete 🗑','callback_data'=>'Delete']]]]);


$welcome_key = json_encode([
           'inline_keyboard'=>[
           [['text'=>'My Group 💬','url'=>'https://t.me/+WSXAm6DJiKw2MDVk'],
           ['text'=>'Read This 📚','url'=>'https://t.me/+WSXAm6DJiKw2MDVk']],
           [['text'=>'Games 🎮','callback_data'=>'Games'],
           ['text'=>'Apps 📲','callback_data'=>'Apps']]]]);

$join_key = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Join to Community & Ideas 💻🧠','url'=>'https://t.me/+WSXAm6DJiKw2MDVk'],
           ['text'=>'Dev 👩‍💻','url'=>'tg://openmessage?user_id=1987049771']],
           [['text'=>'Share 🔗','url'=>'https://telegram.me/share/url?url=&text=This%20bot%20has%20been%20development%20by%20OwO%20%F0%9F%A6%8B%20Misa%20Amane%20%F0%9F%A6%8B%20UwU%0AIf%20you%20like%20it%2C%20share%20it%20%3A%29%0Ahttps%3A%2F%2Ft.me%2FCommunity_Ideas_Robot']]]]);

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

if($text =="/start" && $type == 'private' && in_array($from_id,$banned)){
$sticker_banned = $telegram->sendsticker($chat_id, $sticker = "CAACAgIAAxkBAAIDIWKorznfoLyO45g2HdbHWG-aYa5VAAKjAQACEBptIkfOxfML2NdjJAQ", $replyMarkup = null)->result->message_id;
$banned_first = $telegram->sendMessage($chat_id, $text = "Well, you're a stupid person 🙂", $replyMarkup = $null)->result->message_id;
sleep(4);
$banned_edit = $telegram->editMessageText($chat_id, $message_id = $banned_first, $text = "Do you know why?", $replyMarkup = null)->result->message_id;
sleep(4);
$banned_second = $telegram->editMessageText($chat_id, $message_id = $banned_edit, $text = "Because you think you're smart but you're an idiot :)\nAnyway If you think otherwise, contact the originating developer OwO 🦋 Misa Amane 🦋 UwU", $replyMarkup = null)->result->message_id;
sleep(4);
$telegram->Delete($chat_id, $message_id = $banned_second);
$telegram->Delete($chat_id, $message_id = $sticker_banned);
$telegram->sendMessage($chat_id = '1987049771', $text = "User: $mention\nID: $from_id\n$new_time", $replyMarkup = null);
}
elseif($text =="/start" && $type == 'private'){
$telegram->typing($chat_id, $action = 'typing');
sleep(2);
$telegram->unpin($chat_id);
sleep(2);
$wl = $telegram->sendMessage($chat_id, $text = "Well, since you've joined, let's get started 🙂", $replyMarkup = null)->result->message_id;
sleep(3);
$telegram->typing($chat_id, $action = 'typing');
$welcome_edit = $telegram->editMessageText($chat_id, $message_id = $wl, $text = $welcome_first, $replyMarkup = $welcome_key)->result->message_id;
sleep(2);
$pin = $telegram->editMessageText($chat_id, $message_id = $wl, $text = $welcome_join, $replyMarkup = $welcome_key)->result->message_id;
$telegram->pin($chat_id, $message_id = $pin);
}

switch ($text)
{
    case "memo":
$telegram->sendDocument($chat_id = $chatid, $document = "https://t.me/VMOS_Apks/10", $caption = null, $replyMarkup = null);
    break;
    case "memo":
$telegram->sendMessage($chat_id, $text = "No way", $replyMarkup = null);
    break;
    case "memo":
$telegram->sendMessage($chat_id, $text = "Ok", $replyMarkup = null);
    break;
}

if($new){
$telegram->Mute_New_Chat_Members($chat_id, $new_chat_member_id, $time);}

$pm = "Please <a href='tg://user?id=$user_id'>$first_name</a> click here";

if(isset($update) && $data == "Games"){
$games = json_encode([
           'inline_keyboard'=>[
           [["text"=>"Strategy Games","callback_data"=>"Strategy"],
           ["text"=>"Android 11 and less","callback_data"=>"k"]],
           [["text"=>"Share 🗑","url"=>"https://telegram.me/share/url?url=&text=This%20bot%20has%20been%20development%20by%20OwO%20%F0%9F%A6%8B%20Misa%20Amane%20%F0%9F%A6%8B%20UwU%0AIf%20you%20like%20it%2C%20share%20it%20%3A%29%0Ahttps%3A%2F%2Ft.me%2FCommunity_Ideas_Robot"],
           ["text"=>"Delete","callback_data"=>"Delete"]]]]);

$telegram->alret($alretcall, $text = "new version of public games 🎮", $showAlert = false);
$telegram->sendMessage($chat_id = $chatid, $text = "Please Choice your game", $replyMarkup = $games);
}

  $url = 'https://www.apkmirror.com/apk/facebook-2/feed/';
  $rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item){
  $line = $item->title;
  break;
}  
if($data=="k"){
  $telegram->alret($alretcall, $text = $line, $showAlert = true);
}

if(isset($update) && $data == "Apps"){
$apps = json_encode([
           'inline_keyboard'=>[
           [["text"=>"Communications 💬","callback_data"=>"Architectural"],
           ["text"=>"Stories Makers 📹","callback_data"=>"Stories Makers"]],
           [["text"=>"VPN Apps 📲","callback_data"=>"vpn"],
           ["text"=>"Tools 🛠","callback_data"=>"Tools"]],
           [["text"=>"Share 🔗","url"=>"https://telegram.me/share/url?url=&text=This%20bot%20has%20been%20development%20by%20OwO%20%F0%9F%A6%8B%20Misa%20Amane%20%F0%9F%A6%8B%20UwU%0AIf%20you%20like%20it%2C%20share%20it%20%3A%29%0Ahttps%3A%2F%2Ft.me%2FCommunity_Ideas_Robot"],
           ["text"=>"Delete","callback_data"=>"Delete"]]]]);

$telegram->alret($alretcall, $text = "Apps 📲", $showAlert = false);
sleep(4);
$telegram->alret($alretcall, $text = $Random, $showAlert = false);
$telegram->sendMessage($chat_id = $chatid, $text = "Please Choice your apps", $replyMarkup = $apps);
}

if(isset($update) && $data == "Architectural"){
$arm = json_encode([
           'inline_keyboard'=>[
           [["text"=>"ARMv7","callback_data"=>"Communications ARMv7"],
           ["text"=>"ARMv8","callback_data"=>"Communications ARMv8"]],
           [["text"=>"No Arch","callback_data"=>"Communications No Arch"]]]]);

$telegram->alret($alretcall, $text = "ARM Versions 🆚️", $showAlert = false);
$telegram->editMessageText($chat_id = $chatid, $message_id = $messageid, $text = "The ARMv7 architecture is the basis for all current 32-bit ARM Cortex™ processors, including the Cortex-A15 and Cortex-A9 processors. The ARMv8 architecture is the first ARM architecture that includes 64-bit execution, enabling processors based on the architecture to combine 64-bit execution with 32-bit execution.\nNote: No Arch means\nA universal APK contains code and resources for all ABIs in a single APK. The default value is false . Note that this option is only available in the splits.", $replyMarkup = $arm);
}

if(isset($update) && $data == "Strategy"){
$pubg = json_encode([
           'inline_keyboard'=>[
           [['text'=>'Check PUBG','callback_data'=>'RSSPUBG']]]]);

$telegram->sendDocument($chat_id = $chatid, $document = "BQACAgQAAxkBAAIBNWKoBJvmKyAg6a-kXuHm3SF43QnrAAJwEQACt1AYUb0hq-Y-e9i5JAQ", $caption = "PUBG Mobile from the official website\nBy: $firstname\nTime: $new_time", $replyMarkup = $pubg);
$telegram->sendDocument($chat_id = $chatid, $document = "BQACAgQAAxkBAAIEZmKpGHJhtqjpo0s-FvYNjvux9T5_AAL_DwACG6BJUVwO6MIaypcdJAQ", $caption = "Clash Of Clans: 14.555.11-1473\nAndroid +5: (arm64-v8a,armeabi-v7a)(nodpi)\nBy: $firstname\nTime: $new_time", $replyMarkup = $games);}
$url = 'https://www.apkmirror.com/apk/supercell/clash-of-clans/feed/';
  $rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item){
  $PUBGRSS = $item->title;
  break;}  
if($data=="RSSPUBG"){
  $telegram->alret($alretcall, $text = $PUBGRSS, $showAlert = true);
}

if(isset($update) && $data == "Communications ARMv7"){
$media = [[
       'type' => 'document', 'media' => 'BQACAgQAAxkBAAIGc2Kw6FqrV_nmB-qHuEmpfQABU7vAhAAC1w4AApAjiFGu9Yc42t-zSCgE', 'caption'=>"TikTok ARMv7 + [TikTok Plugin 2.4.6](https://xfiletolinkpro.herokuapp.com/28264/TikTok_Plugin_2.4.6.apk)", 'parse_mode'=>'markdown'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICR2KohiIdT0c3I94r2xW6Pq614yivAAIrDQACNSxAUVS8IIV0q625JAQ', 'caption'=>"$facebook", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICgGKomIRUB4FjHc9_n_yMouV6AAGX5wACPQ0AAjUsQFFhiC22T6XB4CQE', 'caption'=>"Instagram: 239.0.0.14.111-363904704\nAndroid 5: minAPI21(armeabi-v7a)(nodpi)\n<a href='https://www.apkmirror.com/apk/instagram/instagram-instagram/'>Instagram APKMirror Update</a>", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAIChmKom0vFXJUndnl2bnhwM40VNB5rAAI_DQACNSxAURirzSWFBBHuJAQ', 'caption'=>"AeroInsta V19.0.4 Clone DEFAULT Hazar\n<a href='https://aeroinsta.com/'>Areo Instagram</a>", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICsGKoo3e5CWEV33ml_eC5O0Mek0_qAAK5DQACrvcAAVGQOIKF11YWHyQE', 'caption'=>"Version: 2.0.0\nMinimum OS: 5.0\nBase: 8.7.4\n<a href='https://telegra.ph/OwlGram---List-of-Features-03-04'>Features</a>\n#armv7 #stable", 'parse_mode'=>'HTML']];
$telegram->alret($alretcall, $text = "Apps for ARMv7 Devices :) 🍸", $showAlert = false);
$telegram->sendMediaGroup($chat_id = $chatid, $media, $disable_notification = null, $reply_to_message_id = $message_id);}

if(isset($update) && $data == "Communications ARMv8"){
$media = [[
       'type' => 'document', 'media' => 'BQACAgQAAxkBAAIBpmKoaTGvi0Lu3tKIx3meK8NH_fYcAAIZDQACNSxAUamx7TTqo-3jJAQ', 'caption'=>"$facebook_messanger", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAIGcmKw6Fq82CV0HuJHPxhq3YMwfDXNAALWDgACkCOIUcuzMSpPNDkUKAQ', 'caption'=>"TikTok ARMv8 24.9.3 + [TikTok Plugin 2.4.6](https://xfiletolinkpro.herokuapp.com/28264/TikTok_Plugin_2.4.6.apk)", 'parse_mode'=>'markdown'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICTWKoiCODzEDPTky5cHNNb2pW5WhSAAIuDQACNSxAUYAUEWEGn6tFJAQ', 'caption'=>"$facebook_armv8", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICg2KomhQAAVYRlhpU04PUIylzSl4E-QACPg0AAjUsQFFD2kjQwCt9MSQE', 'caption'=>"Instagram: 239.0.0.14.111-363904658\nAndroid 6: MinAPI23(arm64-v8a)(nodpi)\n<a href='https://www.apkmirror.com/apk/instagram/instagram-instagram/'>Instagram APKMirror Update</a>", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICr2Koo3dekbK8VNTgiJo10nDhLi6eAAK4DQACrvcAAVHGWchEHTMv1CQE', 'caption'=>"Version: 2.0.0\nMinimum OS: 5.0\nBase: 8.7.4\n<a href='https://telegra.ph/OwlGram---List-of-Features-03-04'>Features</a>\n#arm64 #stable", 'parse_mode'=>'HTML']];
$telegram->alret($alretcall, $text = "Apps for ARMv8 Devices :) 📲", $showAlert = false);
$telegram->sendMediaGroup($chat_id = $chatid, $media, $disable_notification = null, $reply_to_message_id = $message_id);}

if(isset($update) && $data == "Communications No Arch"){
$media = [[
       'type' => 'document', 'media' => 'BQACAgQAAxkBAAIBo2KoZXdK1QdN5mJtueLgtwLxgDrxAAIXDQACNSxAUYwQOgib4QjRJAQ', 'caption'=>"$whatsapp", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICrmKoo3eKIARpz34_KRLLcJD_aJzrAAK3DQACrvcAAVGM1Jg_KmX_9yQE', 'caption'=>"Version: 2.0.0\nMinimum OS: 5.0\nBase: 8.7.4\n<a href='https://telegra.ph/OwlGram---List-of-Features-03-04'>Features</a>\n#universal #stable", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAIDsWKovEUUtIgOCjCekQ14gs4avtBKAAJnDgACNSxIUWrfYDsR_LzXJAQ', 'caption'=>"App: Discord\nVersion: 126.15 - Stable (126015)\narm64-v8a + armeabi + armeabi-v7a + mips + mips64 + x86 + x86_64 (nodpi)\nRequired Android +5", 'parse_mode'=>'HTML']];
$telegram->alret($alretcall, $text = "There's no Arch means those apks works on all devices", $showAlert = false);
$telegram->sendMediaGroup($chat_id = $chatid, $media, $disable_notification = null, $reply_to_message_id = $message_id);}

if(isset($update) && $data == "Stories Makers"){
$media = [[
       'type' => 'document', 'media' => 'BQACAgQAAxkBAAICX2KojxvXEsFka-Bmif5xVldwN3rnAAJQDQACLlNAUQEnoItABHkEJAQ', 'caption'=>"INSTORIES: INSTA STORIES MAKER V4.3.0 [PRO]", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICYmKoj6ABqfdj4uyJ6vthpv-dbD2HAAJTDQACLlNAUdkjntzhNoe6JAQ', 'caption'=>"INSPIRY - INSTA STORY TEMPLATES V5.3 [PRO]", 'parse_mode'=>'markdown']];
$telegram->sendMediaGroup($chat_id = $chatid, $media, $disable_notification = null, $reply_to_message_id = $message_id);}

if(isset($update) && $data == "vpn"){
$media = [[
       'type' => 'document', 'media' => 'BQACAgQAAxkBAAIC6GKoqa19RzabO6Wd3Cn_BVHgrt89AAKPDQACLlNAUa1-l0x-RLLwJAQ', 'caption'=>"Power VPN Fast Secure Unlimited VPN PRO v1.99 build 318 AOSP No", 'parse_mode'=>'HTML'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICaGKokReLWZ4x6ytzqu4thIlMoZIOAAJWDQACLlNAUdi0KyLItU-3JAQ', 'caption'=>"VPNHUB: UNLIMITED & SECURE V3.16.12 [PRO] [MOD]", 'parse_mode'=>'markdown'],
      ['type' => 'document', 'media' => 'BQACAgQAAxkBAAICa2Koka0dBvXKu9_Yq0UgMoBzDL7VAAJXDQACLlNAUa8vIVThl8v3JAQ', 'caption'=>"Go VPN 1.9.4 Mod", 'parse_mode'=>'HTML']];
$telegram->alret($alretcall, $text = "Best VPN Apps 🍸🥳", $showAlert = false);
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

$tiktok = json_encode([
           'inline_keyboard'=>[
           [["text"=>"CPU Info ℹ️","callback_data"=>"Info CPU"],
           ["text"=>"APKs","callback_data"=>"Architectural"]]]]);

if(preg_match("/(TikTok|tiktok|TIKTOK)/", $text) && $type =='private'){
$telegram->typing($chat_id, $action = 'typing');
sleep(2);
$telegram->sendMessage($chat_id, $text = "By this you can download the mod version of TikTok :)", $replyMarkup = $tiktok);}

if(isset($update) && $data == "Info CPU"){
$telegram->sendMessage($chat_id, $text = "Ok", $replyMarkup = null);}



?>
