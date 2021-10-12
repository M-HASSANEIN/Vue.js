<?php
include "./App.php";
//index.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");

///////////autoload function//////

/* var_dump($received_data); */
$result = [];
$action = "";
//to send url from js to php and catch it
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
//if we send action fetch all
if ($action == "fetch-all") {
    $controller = new App;
    $result = $controller->GetAllToDo();
    echo json_encode($result);
}
if ($action == "create") {
    $received_data = json_decode(file_get_contents("php://input"));

    var_dump($received_data->text);
    $text = $received_data->text;
    $day = $received_data->day;
    $reminder = $received_data->reminder;
    $controller = new App;
    $result = $controller->AddNewTask($text, $day, $reminder);
    header("http://localhost:3000/index.php"+"?action=fetch-all");
}
