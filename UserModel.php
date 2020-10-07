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
        $sentencia = $this->db->prepare("SELECT password FROM usuario WHERE email = ?");
        $sentencia->execute([$mail]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}