<?php

class UserRepository{
    private PDO $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function createUser($name, $email, $password){
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        $sql = "INSERT INTO users (name, email, password) VALUES (?,?,?);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $email);
        $statement->bindValue(3, $hash);
        $statement->execute();
    }
    public function readUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        return $userData;
    }
}