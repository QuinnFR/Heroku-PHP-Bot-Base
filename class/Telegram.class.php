<?php

class Telegram {
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    private function bot($method , $data){
        $url = 'https://api.telegram.org/bot'.$this->token.'/'.$method;
        $ch = curl_init($url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER , TRUE);
        curl_setopt($ch , CURLOPT_POSTFIELDS , $data);

        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res);
    }



    public function forwardMessage($from, $to, $message_id){
        return $this->bot('forwardMessage' , [
            'chat_id'  => $to,
            'from_chat_id' =>$chat_id,
            'message_id' => $message_id,
        ]);
    }
    public function copyMessage($from , $to , $message_id , $reply = null,$reply_to_message_id = null){
        return $this->bot('copyMessage' , [
            'chat_id'  => $to,
            'from_chat_id' => $from,
            'message_id' => $message_id,
            'reply_markup' => $reply,
            'reply_to_message_id' => $reply_to_message_id
        ]);
    }

    public function answerCallbackQuery($alretcall , $text , $alert){
        return $this->bot('answerCallbackQuery',[
            'callback_query_id' => $alretcall,
            'text' => $text,
            'show_alert' => $alert
        ]);
    }
    public function edit_replay($chatid , $msgid ,$reply){
	return $this->bot('editMessageReplyMarkup',[
            'chat_id'=>$chatid,
            'message_id'=>$msgid,
            'protect_content'=>true,
            'reply_markup'=>$reply
		]);
	}


    public function edit_caption($chat_id ,$caption, $messag_id ,$reply){
	return $this->bot('EditMessageCaption',[
            'chat_id'=>$chat_id,
            'message_id'=>$message_id,
            'caption'=>$caption,
            'protect_content'=>true,
            'reply_markup'=>$reply
		]);
	}

    public function Random_msg_top($alretcall, $random_alret){
        return $this->bot('answercallbackquery',[
            'callback_query_id' =>$alretcall,
            'text'=>$random_alret,]);}


    Public function typing($chat_id, $action = 'typing'){ 
        return $this->bot("sendChatAction",[
            'chat_id'=>$chat_id,
            'action'=>$action]);}

    public function jsonData($chat_id, $text){
       return $this->bot('sendMessage',[
            'chat_id' =>$chat_id,
            'text' =>$text]);}

    public function sendMessage($chat_id, $text, $replyMarkup){
         return $this->bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>$text,
            'protect_content'=>true,
            'parse_mode'=> 'HTML',
            'disable_web_page_preview'=>'flase',
            'reply_markup'=>$replyMarkup]);}

     public function forcereply($chat_id, $text, $message_id, $input){
         return $this->bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>$text,
            'protect_content'=>true,
            'disable_web_page_preview'=>'flase',
            'parse_mode'=> 'HTML',
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>json_encode([
            'force_reply' => true,
            'input_field_placeholder' => $input,
            'selective' => true])]);}


      
    public function sendMessageLite($chat_id, $text){
         return $this->bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>$text]);}

    public function sendMessageInlineKeyboard($chat_id, $text, $replyMarkup){
         return $this->bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>$text,
            'protect_content'=>true,
            'parse_mode'=>'HTML',
            'disable_web_page_preview'=>'flase',
            'reply_markup' =>$replyMarkup]);}

    public function sendPhoto($chat_id, $photo, $caption = null){
          return $this->bot('sendphoto',[
             'chat_id'=>$chat_id,
             'photo'=>$photo,
             'parse_mode'=>'HTML',
             'protect_content'=>true,
             'caption'=>$caption,
             'reply_markup' =>$replyMarkup]);}

    public function sendPhotoViaID($chat_id, $photo, $caption = null){
           return $this->bot('sendphoto',[
              'chat_id'=>$chat_id,
              'photo'=>$photo,
              'parse_mode'=>'HTML',
              'protect_content'=>true,
              'caption'=>$caption]);}

    public function sendAudio($chat_id, $audio, $caption, $title ,$performer = null){
            return $this->bot('sendaudio',[
              'chat_id'=>$chat_id,
              'audio'=>$audio,
              'caption'=>$caption,
              'parse_mode'=>'HTML',
              'protect_content'=>true,
              'title'=>$title,
              'performer'=>$performer]);}

    public function sendDocument($chat_id, $document, $caption, $replyMarkup){
            return $this->bot('senddocument',[
              'chat_id'=>$chat_id,
              'document'=>$document,
              'caption'=>$caption,
              'protect_content'=>true,
              'parse_mode'=>'HTMl',
              'reply_markup' =>$replyMarkup]);}

   public function sendVideo($chat_id, $video, $caption){
            return $this->bot('sendvideo',[
              'chat_id'=>$chat_id,
              'video'=>$video,
              'parse_mode'=>'HTML',
              'protect_content'=>true,
              'caption'=>$caption]);}

   public function sendVoice($chat_id, $voice, $caption){
            return $this->bot('sendvoice',[
              'chat_id'=>$chat_id,
              'voice'=>$voice,
              'parse_mode'=>'HTML',
              'protect_content'=>true,
              'caption'=>$caption]);}

public function sendsticker($chat_id, $sticker, $replyMarkup){
            return $this->bot('sendSticker',[
              'chat_id'=>$chat_id,
              'sticker'=>$sticker,
              'parse_mode'=>'HTML',
              'protect_content'=>true,
              'reply_markup' =>$replyMarkup]);}

   public function alret($alretcall, $text, $showAlert = false){
            return $this->bot('answerCallbackQuery', [
              'callback_query_id' => $alretcall,
              'text' =>$text,
              'show_alert'=>$showAlert,
                                ]);
                      }

   public function Mute_New_Chat_Members($chat_id, $new_chat_member_id, $time){
           return $this->bot('restrictChatMember', [
              'chat_id' => $chat_id,
              'user_id' => $new_chat_member_id,
              'until_date' => $time,
              'can_send_messages' =>false,
              'can_send_media_messages' => false,
              'can_send_other_messages' => false,
              'can_add_web_page_previews' => false
                                  ]);}

   public function Banned($chat_id, $user_id, $time){
           return $this->bot('banChatMember', [
              'chat_id' => $chat_id,
              'user_id' => $user_id,
              'until_date' => $time,
              'revoke_messages' => true
                                  ]);}


   public function Delete($chat_id, $message_id){
          return $this->bot('deleteMessage', [
              'chat_id'=> $chat_id,
              'message_id'=>$message_id ]);}

   public function pin($chat_id, $message_id){
         return $this->bot('pinChatMessage', [
              'chat_id'=> $chat_id,
              'message_id'=>$message_id ]);}

   public function unpin($chat_id){
         return $this->bot('unpinAllChatMessages', [
              'chat_id'=> $chat_id]);}

   public function leaveChat($chat_id){
         return $this->bot('LeaveChat', [
              'chat_id'=> $chat_id ]);}

   public function editMessageText($chat_id, $message_id, $text, $replyMarkup){
       return $this->bot('editMessageText', [
              'chat_id' => $chat_id,
              'message_id' => $message_id,
              'text' => $text,
              'parse_mode' =>'HTML',
              'protect_content'=>true,
              'reply_markup' => $replyMarkup,
        ]);
    }
   public function editMessageTextCallBack($chat_id, $message_id, $text, $parseMode = null, $disablePreview = false, $replyMarkup = null, $inlineMessageId = null){
       return $this->bot('editMessageText', [
             'chat_id' => $chat_id,
             'message_id' => $message_id,
             'text' => $text,
             'parse_mode' => 'HTML',
             'protect_content'=>true,
             'disable_web_page_preview' => $disablePreview,
             'reply_markup' => $replyMarkup,
        ]);
    }

   public function getChatMemberStatus($chat_id, $user_id){
      return  $getstatus = $this->bot('getChatMember', [
            'chat_id'=> $chat_id,
            'user_id'=> $user_id]);
            $st = $getstatus->result->status;}


   public function rss($line){
      return $url = 'https://daryo.uz/feed/';
             $rss = simplexml_load_file($url);
      foreach ($rss->channel->item as $item){
             $line = $item->title;
              break;}}

//in $media send an associative array with type and id/link/path. Exaple: $media = [['type' => 'photo', 'media' => '1234'], ['type' => 'video', 'media' => 'https://site/video.mp4']] https://core.telegram.org/bots/api#inputmedia
   public function sendMediaGroup($chat_id, $media, $disable_notification = null, $reply_to_message_id = null){
             $media = json_encode($media);
             $args = [
                      'chat_id' => $chat_id,
                      'media'   => $media,
                      'parse_mode' => $parse_mode,
                      'protect_content'=>true,
                      'reply_to_message_id' => $reply_to_message_id
                     ];
    return $this->bot('sendMediaGroup', $args);
}


   public function answerInlineQuery($inline_query_id, $results, $cache_time = 0, $is_personal = false, $next_offset = '', $switch_pm_text = '', $switch_pm_parameter = '') {
        $res = $this->bot('answerInlineQuery', [
            'inline_query_id' => $inline_query_id,
            'results' => json_encode($results),
            'cache_time' => $cache_time,
            'is_personal' => $is_personal,
            'next_offset' => $next_offset,
            'switch_pm_text' => $switch_pm_text,
            'switch_pm_parameter' => $switch_pm_parameter
        ]);
        return $res;
    }

   public function getChatMember($chat_id, $user_id){
        return this->bot('getChatMember', [
            'chat_id' => $chat_id,
            'user_id' => $user_id]); }

   public function getUserProfilePhotos($chat_id, $user_id){
        return this->bot('getChatMember', [
            'user_id' => $user_id]); }
}


   
   public function approveJoinRequest($chat_id, $user_id){
        return this->bot('approveChatJoinRequest', [
            'chat_id' => $chat_id,
            'user_id' => $user_id]); }

   

?>
