<?php
//index.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");

try {
    $pdo = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', '');
    $received_data = json_decode(file_get_contents("php://input"), true);

    $result = [];
    $action = "";
    //to send url from js to php and catch it
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }
    //if we send action fetch all
    if ($action == "fetch-all") {
        $sql = "SELECT *FROM tasks
           ORDER BY id ASC";
        $statement = $pdo->query($sql);
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    //if we send creat fetch all
    if ($action == "create") {
        $sql = "INSERT INTO  tasks
           ORDER BY id ASC";
        $statement = $pdo->query($sql);
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }

    echo json_encode($result);
//add to database

} catch (Exception $e) {
    print_r($e);
}
