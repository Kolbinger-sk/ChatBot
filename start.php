<?php
spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

session_start();

define("Chat_Server_Url", "https://online-lectures-cs.thi.de/chat/");
define("Chat_Server_Id", "c0c4f1af-179d-494a-bd42-b4c38186d7fe");

$service = new utils\BackendService(Chat_Server_Url, Chat_Server_Id);

?>