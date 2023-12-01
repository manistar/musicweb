<?php
// require_once "consts/Regex.php";
$accepted_actions = ["withdraw", "chat-list", "trade_chart", "new", 'trades', 'list', "view", "edit", "overview", "transfer"];
$action = "list";
if (isset($_GET['action'])) {
    $action = htmlspecialchars($_GET['action']);
}
if (!isset($pageexclude)) {
    $pageexclude = "no";
}

// echo $page;
if (file_exists("functions/" . $page . ".php")) {
    require_once "functions/$page.php";
    if (!isset(${substr($page, 0, 1)})) {
        ${substr($page, 0, 1)} = new $page;
    } else {
        ${substr($page, 0, 2)} = new $page;
    }
}
if (file_exists("pages/" . $page . "/ini.php")) {
    require_once "pages/" . $page . "/ini.php";
}
if (file_exists("consts/$page" . ".php")) {
    require_once "consts/$page" . ".php";
}

if (in_array($action, $accepted_actions) && file_exists("pages/" . $page . "/" . $action . ".php") && $pageexclude != "yes") {
    require_once "pages/" . $page . "/" . $action . ".php";
}
