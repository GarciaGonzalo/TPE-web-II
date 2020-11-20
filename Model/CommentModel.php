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
        $query = $this->db->prepare("SELECT 
        comment.rating as 'rating',
        comment.content as 'content',
        comment.timestamp as 'timestamp',
        user.email as 'user'
        FROM comment INNER JOIN user on comment.id_user = user.id WHERE id_chapter=?");
        $query->execute([$chapter_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    function deleteComment($id)
    {
        $query = $this->db->prepare('DELETE FROM comment WHERE id =?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    function insertcomment($content,$rating,$id_chapter,$id_user)
    {
        $query = $this->db->prepare('INSERT INTO comment (content,rating,id_chapter,id_user) VALUES(?,?,?,?)');
        return $query->execute([$content,$rating,$id_chapter,$id_user]);
    }
}
