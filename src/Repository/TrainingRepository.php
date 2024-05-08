<?php

class TrainingRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function makeObject($data)
    {
        return new Training($data['id'], $data['name'], $data['level']);
    }

    public function trainingOptions():array
    {
        $sql1 = "SELECT * FROM gym_workouts";
        $statement = $this->pdo->query($sql1);
        $trainingList = $statement->fetchAll(PDO::FETCH_ASSOC);

        // mapeamento do banco de dados e conversão em valores php e criação de um array de objetos
        $dataTraining = array_map(function($training){
            return $this->makeObject($training);
        }, $trainingList);
        return $dataTraining;
    }
    public function deleteTraining(int $id)
    {
        $sql = "DELETE FROM gym_workouts WHERE id=?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        header("Location:main.php");
    }
    public function createTraining(Training $training)
    {
        $sql = "INSERT INTO gym_workouts (name, level) VALUES (?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $training->getName());
        $statement->bindValue(2, $training->getLevel());
        $statement->execute();
    }
    public function readTraining(int $id)
    {
        $sql = "SELECT * FROM gym_workouts WHERE id = ?";
        $statement =  $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->makeObject($data);;
    }
    public function updateTraining(Training $training)
    {
        $sql = "UPDATE gym_workouts SET name=?, level=? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $training->getName());
        $statement->bindValue(2, $training->getLevel());
        $statement->bindValue(3, $training->getId());
        $statement->execute();
    }
}