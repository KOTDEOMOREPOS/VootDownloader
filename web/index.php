<?php
require_once __DIR__ . "/config.php";

use skrtdev\NovaGram\Bot;
use skrtdev\Telegram\{Message, Exception as TelegramException};

$Bot = new Bot($GLOBALS["TG_BOT_TOKEN"], [
    "disable_ip_check" => true,
    "parse_mode" => "HTML",
    "disable_notification" => true,
    "disable_web_page_preview" => true,
    "debug" => $GLOBALS["TG_DUMP_CHANNEL_ID"],
]);

$Bot->onCommand('start', function(Message $message, array $args) use ($Bot) {
    $chat = $message->chat;

    if(empty($args) || $args[0] === ""){
        $message->reply($GLOBALS["START_MESSAGE"]);
    }
    else{
        if (strpos($args[0], "_") !== FALSE) {
            $msg_param_s = explode("_", $args[0]);
            $req_message_id = $msg_param_s[1];
            try {
                $chat->copyMessage([
                    "from_chat_id" => $GLOBALS["TG_DUMP_CHANNEL_ID"],
                    "message_id" => $req_message_id,
                    "reply_to_message_id" => $message->message_id
                ]);
            }
            catch (TelegramException $e) {
                /**
                 * sometimes, forwarding FAILS 😉
                 */
            }
        }
        else {
            $message->delete();
        }
    }
});

$Bot->onMessage(function (Message $message){
    if(!isset($message->text)){
        if ($GLOBALS["IS_PUBLIC"] !== FALSE) {
            $message->getLink();
        }
        else if (in_array($chat_id, $GLOBALS["TG_AUTH_USERS"])) {
            $message->getLink();
        }
        else {
            $message->delete();
        }
    }
});

$url =$_GET['q'];
$id = end(explode('/', $url));
$api =file_get_contents("https://apiv2.voot.com/wsv_2_3/playBack.json?mediaId=$id");
$apis =json_decode($api);
$url =$apis->assets[0]->assets[0]->items[0]->URL;
$title =$apis->assets[0]->assets[0]->items[0]->mediaName;
$des =$apis->assets[0]->assets[0]->items[0]->desc;
$img =$apis->assets[0]->assets[0]->items[0]->imgURL;
if($url ==""){
$status ="invalid error";
}
else{
$status="ok";
}
$apii = array("status" => $status, "title" => $title, "description" => $des, "thumbnail" => $img, "video_url" => $url);
$api =json_encode($apii);
header("Content-Type: application/json");
echo $api;
