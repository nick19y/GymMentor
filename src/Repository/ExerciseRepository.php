<?php

class ExerciseRepository
{
    private PDO $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function makeObject($data)
    {
        return new Exercise($data['id'], $data['name'], $data['repetitions'], $data['weight'], $data['description']);
    }
    public function createExercise(Exercise $exercise)
    {
        $sql = "INSERT INTO gym_exercises (name, repetitions, weight, description) VALUES(?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $exercise->getName());
        $statement->bindValue(2, $exercise->getRepetitions());
        $statement->bindValue(3, $exercise->getWeight());
        $statement->bindValue(4, $exercise->getDescription());
        $statement->execute();
    }
    public function readExercises(){
        $sql = "SELECT * FROM gym_exercises";
        $statement = $this->pdo->query($sql);
        $exercisesList = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dataExercises = array_map(function($exercise){
            return $this->makeObject($exercise);
        }, $exercisesList);
        return $dataExercises;
    }
    public function addExercise(Training $training, Exercise $exercise)
    {
        $sql = "INSERT INTO workout_exercises (workout_id, exercise_id) VALUES (?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $training->getId());
        $statement->bindValue(2, $exercise->getId());
        // arrumar uma forma de pegar os ids pelo php no front
    }
}