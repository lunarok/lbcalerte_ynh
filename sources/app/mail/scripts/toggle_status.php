<?php

if (isset($_GET["id"]) && $alert = $storage->fetchById($_GET["id"])) {
    $status = isset($_GET["s"])?$_GET["s"]:"";
    if (in_array($status, array("suspend", "send_mail", "send_sms"))) {
        $alert->$status = !$alert->$status;
        $storage->save($alert);
    }
}
header("LOCATION: ./?mod=mail"); exit;