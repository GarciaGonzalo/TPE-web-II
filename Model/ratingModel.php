<?php
class ratingModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=friends_db;charset=utf8', 'root', '');
    }

    function getRating($id_chapter, $id_user)
    {
        $query = $this->db->prepare('SELECT rating FROM rating WHERE id_user=? AND id_chapter =?');
        $query->execute([$id_user, $id_chapter]);

        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_OBJ)->rating;
        } else {
            return NULL;
        }
    }
    function insertRating($rating,$id_user,$id_chapter)
    {
        $query = $this->db->prepare('INSERT INTO rating (rating,id_user,id_chapter) VALUES(?,?,?)');
        $query->execute([$rating,$id_user,$id_chapter]);
        return $query->rowCount();
    }

    function updateRating($rating,$id_user,$id_chapter)
    {
       $query = $this->db->prepare('UPDATE rating SET rating =? WHERE id_user=? AND id_chapter=?');
        $query->execute([$rating,$id_user,$id_chapter]);
        return $query->rowCount();
    }
    function deleteRatingChapter($id_chapter)
    {
        $query = $this->db->prepare("DELETE FROM rating WHERE id_chapter =?");
        $query->execute([$id_chapter]);
    }

    function deleteRatingUser($id_user)
    {
        $query = $this->db->prepare("DELETE FROM rating WHERE id_user=?");
        $query->execute([$id_user]);
    }
}
