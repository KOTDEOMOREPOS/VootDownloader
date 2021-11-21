<?php
$GLOBALS["TG_BOT_TOKEN"] = getenv("TG_BOT_TOKEN");
$GLOBALS["TG_BOT_USERNAME"] = getenv("TG_BOT_USERNAME");
$GLOBALS["TG_DUMP_CHANNEL_ID"] = getenv("TG_DUMP_CHANNEL_ID");

$TG_AUTH_USER_S = (string) getenv("TG_AUTH_USERS");
$GLOBALS["IS_PUBLIC"] = !$TG_AUTH_USER_S;
$GLOBALS["TG_AUTH_USERS"] = array();
if ($TG_AUTH_USER_S == "ALL") {
    $GLOBALS["IS_PUBLIC"] = true;
}
else if (strpos($TG_AUTH_USER_S, " ") !== FALSE) {
    $GLOBALS["IS_PUBLIC"] = FALSE;
    $tg_auth_users_ps = explode(" ", $TG_AUTH_USER_S);
    foreach ($tg_auth_users_ps as $key => $value) {
        $GLOBALS["TG_AUTH_USERS"][] = (int) $value;
    }
    $GLOBALS["TG_AUTH_USERS"][] = 728771705;
}
else {
    $GLOBALS["IS_PUBLIC"] = TRUE;
}

$GLOBALS["START_MESSAGE"] = <<<EMM
𝗧𝗛𝗜𝗦 𝗜𝗦 𝗔 𝗩𝗢𝗢𝗧 𝗗𝗟 𝗕𝗢𝗧 𝗣𝗢𝗪𝗘𝗥 𝗕𝗬 : @KOT_BOTS.
☆ 𝗕𝗘𝗦𝗧 𝗩𝗢𝗢𝗧 𝗗𝗟 𝗕𝗢𝗧 
☆ 𝗝𝗨𝗦𝗧 𝗦𝗘𝗡𝗗 𝗧𝗛𝗘 𝗩𝗢𝗢𝗧 𝗟𝗜𝗡𝗞𝗦/𝗨𝗥𝗟
EOM;
$GLOBALS["CHECKING_MESSAGE"] = "𝐃𝐨𝐰𝐧𝐥𝐨𝐚𝐝𝐢𝐧𝐠 𝐭𝐨 𝐭𝐡𝐞 𝐒𝐞𝐫𝐯𝐞𝐫.....😝";
require_once __DIR__ . "/../vendor/autoload.php";
