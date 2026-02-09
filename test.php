<?php
require("start.php");
$user = new Model\User("Test");
$json = json_encode($user);
echo $json . "<br>";
$jsonObject = json_decode($json);
$newUser = Model\User::fromJson($jsonObject);
var_dump($newUser);

$user = new Model\Friend("Test");
$user->setStatusAccepted();
$json = json_encode($user);
echo $json . "<br>";
$jsonObject = json_decode($json);
$newUser = Model\Friend::fromJson($jsonObject);
var_dump($newUser);

$service = new utils\BackendService(Chat_Server_Url, Chat_Server_Id);
var_dump($service->test());
var_dump($service->login("Test123", "12345678"));
var_dump($service->register("Test123", "12345678"));
var_dump($service->login("Test123", "12345678"));
var_dump($service->loadUser("Test123"));

?>