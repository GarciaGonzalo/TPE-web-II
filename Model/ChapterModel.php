<?php
class ChapterModel
{
    private $db;
    function __construct()
    {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=friends_db;charset=utf8', 'root', '');
    }

    function GetChapters($season = null)
    {
        if ($season !== "all") {
            $sentencia = $this->db->prepare("SELECT * FROM chapter Where id_season = ? ORDER BY emision_date ASC");
            $sentencia->execute(array($season));
        }
        else {
            $sentencia = $this->db->prepare("SELECT * FROM chapter INNER JOIN season ON chapter.id_season = season.id ORDER BY emision_date ASC");
            $sentencia->execute();
        }
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function InsertChapter($title,$chapter_number,$director,$writer,$description,$date,$id_season)
    {
        $sentencia = $this->db->prepare("INSERT INTO chapter(title,chapter_number,director,writer,description,emision_date,id_season) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($title,$chapter_number,$director,$writer,$description,$date,$id_season));
    
    }
    
    function UpdateChapter($title,$director,$writer,$description,$date,$chapter_number,$id) 
    {
        $sentencia = $this->db->prepare('UPDATE chapter SET title=?,director=?,writer=?,description=?,emision_date=?,chapter_number=? WHERE id=?');
        $sentencia->execute(array($title,$director,$writer,$description,$date,$chapter_number,$id));
    }

    function DeleteChapter($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM chapter WHERE id=?");
        $sentencia->execute(array($id));
    }
    function DeleteAllChapters($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM chapter WHERE id_season=?");
        $sentencia->execute(array($id));  
    }
    function GetChapter($id)
    {
        $sentencia =$this->db->prepare("SELECT * FROM chapter WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}