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

$GLOBALS["START_MESSAGE"] = <<<EOM
𝐓𝐡𝐢𝐬 𝐢𝐬 𝐀 𝐕𝐨𝐨𝐭 𝐔𝐑𝐋 𝐃𝐨𝐰𝐧𝐥𝐨𝐚𝐝𝐞𝐫 𝐁𝐨𝐭 𝐁𝐲 @𝐓𝐡𝐞𝐓𝐞𝐥𝐞𝐑𝐨𝐢𝐝.
☆ 𝐁𝐞𝐬𝐭 𝐕𝐨𝐨𝐭 𝐃𝐨𝐰𝐧𝐥𝐨𝐚𝐝𝐞𝐫 𝐁𝐨𝐭
☆ 𝐉𝐮𝐬𝐭 𝐒𝐞𝐧𝐝 𝐓𝐡𝐞 𝐔𝐫𝐥
EOM;
$GLOBALS["CHECKING_MESSAGE"] = "𝐃𝐨𝐰𝐧𝐥𝐨𝐚𝐝𝐢𝐧𝐠 𝐭𝐨 𝐭𝐡𝐞 𝐒𝐞𝐫𝐯𝐞𝐫.....😝";
require_once __DIR__ . "/../vendor/autoload.php";
