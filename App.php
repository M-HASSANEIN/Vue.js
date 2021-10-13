<?php
include "./ModelManger.php";
class App extends ModelManager
{
    public function GetAllToDo()
    {
        $req = "SELECT *FROM tasks
               ORDER BY id ASC";
        return $this->queryFetchAll($req);

    }
    //add task to the data base
    public function AddNewTask($text, $day, $reminder)
    {
        $req = " INSERT INTO tasks(`text`,`day`,`reminder`) VALUES (?,?,?)";
        $this->query($req, [$text, $day, $reminder]);
    }
    //delete task from data base
    public function DeleteTask($id)
    {
        $req = "DELETE FROM tasks WHERE tasks.id=?";
        $this->query($req, [$id]);

    }
    //up date full album from to data base
    public function UpDateTask($reminder, $id)
    {
        $req = "UPDATE tasks SET `reminder`=?  WHERE id=?";
        return $this->query($req, [$reminder, $id]);
    }
    //select  task  from data base
    public function FetchTask($id)
    {
        $req = "SELECT* FROM tasks WHERE tasks.id=?";
        return $this->queryFetch($req, [$id]);

    }
}
