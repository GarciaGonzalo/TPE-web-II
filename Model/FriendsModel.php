<?php
class FriendsModel
{
    private $db;
    function __construct()
    {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=friends_db;charset=utf8', 'root', '');
    }

    function GetChapters($season = null)
    {
        if ($season !== "all") {
            $sentencia = $this->db->prepare("SELECT * FROM chapter INNER JOIN season ON chapter.id_season = season.id AND season.season = ? ORDER BY emision_date ASC");
            $sentencia->execute(array($season));
        }
        else {
            $sentencia = $this->db->prepare("SELECT * FROM chapter ORDER BY emision_date ASC");
            $sentencia->execute();
        }
       return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function InsertChapter($title,$chapter_number,$director,$writer,$description,$date,$season)
    {
        $sentencia = $this->db->prepare("SELECT id FROM season WHERE season = ?");
        $sentencia->execute([$season]);
        $resultado = $sentencia->fetchAll(pdo::FETCH_OBJ);
        $id_season = $resultado[0]->id;
        $sentencia = $this->db->prepare("INSERT INTO chapter(title,chapter_number,director,writer,description,emision_date,id_season) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($title,$chapter_number,$director,$writer,$description,$date,$id_season));
       
    }
}