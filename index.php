<?php
include "./App.php";
//index.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
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
    $text = $received_data->text;
    $day = $received_data->day;
    $reminder = $received_data->reminder;
    $controller = new App;
    $result = $controller->AddNewTask($text, $day, $reminder);
    echo json_encode($result);
}
if ($action == "delete") {
    $received_data = json_decode(file_get_contents("php://input"));
    $id = $received_data->id;

    $controller = new App;
    $result = $controller->DeleteTask($id);
    echo json_encode($result);
}
if ($action == "id") {
    $received_data = json_decode(file_get_contents("php://input"));
    $id = $received_data->id;

    $controller = new App;
    $result = $controller->FetchTask($id);
    echo json_encode($result);
}

if ($action == "update") {
    $received_data = json_decode(file_get_contents("php://input"));
    $id = $received_data->id;
    $reminder = $received_data->UpdReminder;
    $controller = new App;
    $result = $controller->UpDateTask($reminder, $id);
    echo json_encode($result);
}
