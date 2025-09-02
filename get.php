<?php
if (isset($_GET["var"]) && $_GET["var"] === "x") {
    while (true) {
        echo json_encode(["x" => 5], JSON_UNESCAPED_UNICODE);
        flush();
        sleep(1);
    }
}
exit;
?>