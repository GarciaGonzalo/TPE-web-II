<?php
class SeasonModel{
    private $db;
    function __construct()
    {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=friends_db;charset=utf8', 'root', '');
    }

    function GetSeasons($season = null)
    {
        if ($season !== null) {
            $sentencia = $this->db->prepare("SELECT * FROM season WHERE id = ?");
            $sentencia->execute(array($season));
        }
        else {
            $sentencia = $this->db->prepare("SELECT * FROM season ORDER BY season.season ASC");
            $sentencia->execute();
        }
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function GetSeasonId($season_number){
        $sentencia= $this->db->prepare("SELECT id FROM season WHERE season.season = ?");
        $sentencia->execute(array($season_number));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    function DeleteSeason($id)
    {
        
        $sentencia = $this->db->prepare('DELETE FROM season WHERE season.id=?');
        $sentencia->execute(array($id));
    }
    function InsertSeason($season_number_input,$chapter_count)
    {
        $sentencia = $this->db->prepare('INSERT INTO season(season,chapter_count) VALUES (?,?)');
        $sentencia->execute(array($season_number_input,$chapter_count));
    
    }
    function UpdateSeason($season_number_input,$chapter_count,$id_edit)
    {
        $sentencia = $this->db->prepare('UPDATE season SET season =? , chapter_count =? WHERE id =? ');
        $sentencia->execute(array($season_number_input,$chapter_count,$id_edit));
    
    }
}