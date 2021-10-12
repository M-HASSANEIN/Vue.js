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
    //add album to the data base
    public function AddNewTask($text, $day, $reminder)
    {
        $req =
            " INSERT INTO tasks(`text`,`day`,`reminder`) VALUES (?,?,?)";
        $this->query($req, [$text, $day, $reminder]);
    }
    //delete album from data base
    public function DeleteAlbumfromDbase($id)
    {
        $req =
            "DELETE FROM albums WHERE albums.id_album=?";
        $this->query($req, [$id]);

    }
    //up date full album from to data base
    public function UpDateAlbumDbase($name, $image, $date, $id)
    {
        $req =
            "UPDATE albums SET `name`=? ,`image`=?, `date`=? WHERE id_album=?";
        return $this->query($req, [$name, $image, $date, $id]);
    }
}
