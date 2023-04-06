<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "dong-luc-shop";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
date_default_timezone_set("Asia/Ho_Chi_Minh");

const BASE_URL = 'http://localhost/web-the-thao-mvc-oop/';
function route($name) {
    return BASE_URL . $name;
}
function push_notification($type, $msgs,$route) {
    if (!isset($_SESSION["notification"])) $_SESSION["notification"] = [];
    $data = [];
    $data["type"] = $type;
    $data["message"] = $msgs;
    $_SESSION["notification"][] = $data;
    header("location:" . BASE_URL . $route);
    die();
}
function get_notification() {
    if (!isset($_SESSION["notification"])) $_SESSION["notification"] = [];
    $notification = $_SESSION["notification"];
    unset($_SESSION["notification"]);
    return $notification;
}
function load_img($name) {
    return BASE_URL . 'public/images/' . $name;
}
