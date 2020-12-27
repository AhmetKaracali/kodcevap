<?php


$kanal = "@wpbotdeneme"
$token = "1097742184:AAFA7houvjc115bvexR3CAPSfJ4YnPs7pL8"
$mesaj = "MERHABA"

$chat_id = file_get_contents("https://api.telegram.org/bot1097742184:AAFA7houvjc115bvexR3CAPSfJ4YnPs7pL8/getUpdates");

echo file_get_contents("https://api.telegram.org/bot1097742184:AAFA7houvjc115bvexR3CAPSfJ4YnPs7pL8/sendMessage?chat_id={$kanal}&text={$mesaj}");

?>