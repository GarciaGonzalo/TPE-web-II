<?php
class UserModel
{
    private $db;
    function __construct()
    {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=friends_db;charset=utf8', 'root', '');
    }
    function GetHash($mail)
    {
        $sentencia = $this->db->prepare("SELECT password FROM user WHERE email = ?");
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
}