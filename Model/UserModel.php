<?php
class UserModel
{
    private $db;
    function __construct()
    {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=friends_db;charset=utf8', 'root', '');
    }
    function getHashAndId($mail)
    {
        $sentencia = $this->db->prepare("SELECT password, id FROM user WHERE email = ?");
        $sentencia->execute([$mail]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    function InsertUser($mail,$hash)
    {
        $sentencia = $this->db->prepare("INSERT INTO user ( email, password, super_user) VALUES (?, ?, ?)");
        return $sentencia->execute([$mail,$hash,0]);
    }
    function getUser($mail)
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE email = ?');
        $query->execute([$mail]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    function GetUserId($id){
        $query = $this->db->prepare('SELECT * FROM user WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    function getAllUsers(){
        $query = $this->db->prepare('SELECT * FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function DeleteUser($id){
        $query = $this->db->prepare('DELETE FROM user WHERE user.id = ?');
        $query->execute([$id]);
    }
    function UpdateUser($email_input,$super_user_input,$id_edit){
        $query = $this->db->prepare('UPDATE user SET email =? , super_user =? WHERE id =?');
        $query->execute(array($email_input,$super_user_input,$id_edit));
    }
}