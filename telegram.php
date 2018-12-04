<?php
class TelegramBot
{
	public $token, $chat_id, $message, $last_message;

    public function send() {
        $url = "https://api.telegram.org/bot".$this->token."/sendMessage?chat_id=".$this->chat_id."&text=".urlencode($this->message);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0.2 Safari/605.1.15');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
    }

    public function start_webhook() {
        $webhook = file_get_contents("php://input");
        $webhook = json_decode($webhook, true);
        $this->last_message = $webhook["message"]["text"];
        $this->chat_id = $webhook["message"]["chat"]["id"];
    }
}