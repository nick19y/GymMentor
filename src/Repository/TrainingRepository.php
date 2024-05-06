<?php

class TrainingRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function trainingOptions():array
    {
        $sql1 = "SELECT * FROM gym_workouts";
        $statement = $this->pdo->query($sql1);
        $trainingList = $statement->fetchAll(PDO::FETCH_ASSOC);

        // mapeamento do banco de dados e conversão em valores php e criação de um array de objetos
        $dataTraining = array_map(function($training){
            return new Training($training['id'], $training['name'], $training['level'], $training['img']);
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
}