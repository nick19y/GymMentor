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
    public function insertTraining(Training $training, Exercise $exercise)
    {
        $sql = "INSERT INTO workout_exercises (workout_id, exercise_id) VALUES (?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $training->getId());
        $statement->bindValue(2, $exercise->getId());
    }
    public function getLastIdTraining()
    {
        $sql = "SELECT id AS last_id FROM gym_workouts ORDER BY id DESC LIMIT 1";
        $statement = $this->pdo->query($sql);
        $lastId = $statement->fetch(PDO::FETCH_ASSOC)['last_id'];
        return $lastId;
    }
    public function countAmountExercises($id)
    {
        $sql = "SELECT workout_id, COUNT(exercise_id) AS total_exercises
                FROM workout_exercises
                WHERE workout_id = ?
                GROUP BY workout_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $amountExercises = $statement->fetch(PDO::FETCH_ASSOC);
        return $amountExercises['total_exercises'];
    }
}