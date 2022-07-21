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
}


	// Web App Inline Keyboard
	
	public function buildWebAppInlineKeyboardButton($text, $web_app = "") {
		$replyMarkup = array(
			'text' => $text
		);
        if ($web_app != "") {
			$replyMarkup['web_app'] = $web_app;
		}
		return $replyMarkup;
	}	

	/// Create a KeyboardButton
	/** This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
	 * \param $text String; Array of button rows, each represented by an Array of Strings
	 * \param $request_contact Boolean Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
	 * \param $request_location Boolean Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only
	 * \return the requested button as Array
	 */
	public function buildKeyboardButton($text, $request_contact = false, $request_location = false) {
		$replyMarkup = array(
			'text' => $text,
			'request_contact' => $request_contact,
			'request_location' => $request_location
		);
		return $replyMarkup;
	}

	/// Hide a custom keyboard
	/** Upon receiving a message with this object, Telegram clients will hide the current custom keyboard and display the default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user presses a button.
	 * \param $selective Boolean Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
	 * \return the requested keyboard hide as Array
	 */
	public function buildKeyBoardHide($selective = true) {
		$replyMarkup = array(
			'remove_keyboard' => true,
			'selective' => $selective
		);
		$encodedMarkup = json_encode($replyMarkup, true);
		return $encodedMarkup;
	}

	/// Set a custom keyboard
	/** This object represents a custom keyboard with reply options
	 * \param $options Array of Array of String; Array of button rows, each represented by an Array of Strings
	 * \param $onetime Boolean Requests clients to hide the keyboard as soon as it's been used. Defaults to false.
	 * \param $resize Boolean Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
	 * \param $selective Boolean Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
	 * \return the requested keyboard as Json
	 */
	public function buildKeyBoard(array $options, $onetime = false, $resize = false, $selective = true) {
		$replyMarkup = array(
			'keyboard' => $options,
			'one_time_keyboard' => $onetime,
			'resize_keyboard' => $resize,
			'selective' => $selective
		);
		$encodedMarkup = json_encode($replyMarkup, true);
		return $encodedMarkup;
	}



?>
