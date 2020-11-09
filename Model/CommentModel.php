<?php
class CommentModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=friends_db;charset=utf8', 'root', '');
    }

    function selectCommentsOfChapter($chapter_id)
    {
        $query = $this->db->prepare('SELECT * FROM comment WHERE id_chapter=?');
        $query->execute([$chapter_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function deleteComment($id)
    {
        $query = $this->db->prepare('DELETE FROM comment WHERE id =?');
        $query->execute([$id]);
        return $query->rowCount();
    }
}
